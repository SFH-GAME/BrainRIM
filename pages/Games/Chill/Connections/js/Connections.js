// логика для всплывающих окон
let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");

//при нажатии на отмену вспл окна настройки 
document.querySelector('.pop-up__cancel').onclick = function () {
	settings.style = 'visibility:hidden;';
 };
 //при нажатии на иконку настроек
 document.querySelector('.linkToTheSettings').onclick = function () {
	settings.style = 'visibility:visible;';
 };
 //при нажатии на отмену вспл окна назад
 document.querySelector('.pop-up__cancel2').onclick = function () {
	comeback.style = 'visibility:hidden;';
 };
 //при нажатии на иконку назад
 document.querySelector('.comeback-button').onclick = function () {
	comeback.style = 'visibility:visible;';
 };
 //при нажатии на отмену вспл окна рестарт
 document.querySelector('.pop-up__cancel3').onclick = function () {
	restart.style = 'visibility:hidden;';
 };
 //при нажатии на иконку рестарт
 document.querySelector('.linkToTheRestart').onclick = function () {
	restart.style = 'visibility:visible;';
 };

const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

let points = [];
let selectedPoint = null;
let connections = [];
let drawingPath = [];
let gridSize = 4;

// Функция для ресайза канваса
function resizeCanvas() {
    const size = Math.min(window.innerWidth * 0.9, window.innerHeight * 0.9);
    canvas.width = size;
    canvas.height = size;
    canvas.style.margin = "auto";
    generatePoints();
}

// Функция для генерации точек
function generatePoints() {
    points = [];
    connections = [];
    selectedPoint = null;

    let colors = ["red", "blue", "green", "orange"];
    let availablePositions = [];
    let cellSize = canvas.width / gridSize;
    let offset = cellSize / 2;

    for (let x = offset; x < canvas.width; x += cellSize) {
        for (let y = offset; y < canvas.height; y += cellSize) {
            availablePositions.push({ x, y });
        }
    }

    for (let color of colors) {
        for (let i = 0; i < 2; i++) {
            if (availablePositions.length === 0) break;
            let index = Math.floor(Math.random() * availablePositions.length);
            let { x, y } = availablePositions.splice(index, 1)[0];
            points.push({ x, y, color, paired: false });
        }
    }
    draw();
}

// Отрисовка всех объектов
function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    connections.forEach(({ path, color }) => {
        ctx.strokeStyle = color;
        ctx.lineWidth = 4;
        ctx.beginPath();
        ctx.moveTo(path[0].x, path[0].y);
        for (let i = 1; i < path.length; i++) {
            ctx.lineTo(path[i].x, path[i].y);
        }
        ctx.stroke();
    });
    if (drawingPath.length > 1) {
        ctx.strokeStyle = selectedPoint.color;
        ctx.lineWidth = 4;
        ctx.beginPath();
        ctx.moveTo(drawingPath[0].x, drawingPath[0].y);
        for (let i = 1; i < drawingPath.length; i++) {
            ctx.lineTo(drawingPath[i].x, drawingPath[i].y);
        }
        ctx.stroke();
    }
    points.forEach(point => {
        ctx.fillStyle = point.color;
        ctx.beginPath();
        ctx.arc(point.x, point.y, canvas.width * 0.03, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = "black";
        ctx.lineWidth = 2;
        ctx.stroke();
    });
}

function getMousePos(e) {
    const rect = canvas.getBoundingClientRect();
    return {
        x: (e.clientX - rect.left) * (canvas.width / rect.width),
        y: (e.clientY - rect.top) * (canvas.height / rect.height)
    };
}

function getClickedPoint(x, y) {
    return points.find(p => Math.hypot(p.x - x, p.y - y) < canvas.width * 0.03);
}

function ccw(A, B, C) {
    return (C.y - A.y) * (B.x - A.x) > (B.y - A.y) * (C.x - A.x);
}

function doLinesIntersect(p1, p2, p3, p4) {
    return ccw(p1, p3, p4) !== ccw(p2, p3, p4) && ccw(p1, p2, p3) !== ccw(p1, p2, p4);
}

function handleStart(x, y) {
    let clickedPoint = getClickedPoint(x, y);
    if (clickedPoint && !clickedPoint.paired) {
        selectedPoint = clickedPoint;
        drawingPath = [{ x: clickedPoint.x, y: clickedPoint.y }];
    }
}

function handleMove(x, y) {
    if (selectedPoint) {
        drawingPath.push({ x, y });
        for (let conn of connections) {
            for (let i = 0; i < conn.path.length - 1; i++) {
                if (doLinesIntersect(drawingPath[drawingPath.length - 2], drawingPath[drawingPath.length - 1], conn.path[i], conn.path[i + 1])) {
                    drawingPath = drawingPath.slice(0, drawingPath.length - 1);
                    draw();
                    return;
                }
            }
        }
        draw();
    }
}

function handleEnd(x, y) {
    if (!selectedPoint || drawingPath.length < 2) return;
    let targetPoint = getClickedPoint(x, y);
    if (targetPoint && selectedPoint !== targetPoint && selectedPoint.color === targetPoint.color && !targetPoint.paired) {
        let isIntersecting = connections.some(conn => conn.path.some((p, i) => i > 0 && doLinesIntersect(drawingPath[0], drawingPath[drawingPath.length - 1], conn.path[i - 1], p)));
        if (!isIntersecting) {
            connections.push({ path: [...drawingPath], color: selectedPoint.color });
            selectedPoint.paired = true;
            targetPoint.paired = true;
            if (points.every(p => p.paired)) {
                setTimeout(() => {
                    alert("Поздравляем! Следующий уровень!");
                    generatePoints();
                }, 500);
            }
        }
    }
    selectedPoint = null;
    drawingPath = [];
    draw();
}

canvas.addEventListener("mousedown", (e) => handleStart(...Object.values(getMousePos(e))));
canvas.addEventListener("mousemove", (e) => handleMove(...Object.values(getMousePos(e))));
canvas.addEventListener("mouseup", (e) => handleEnd(...Object.values(getMousePos(e))));
canvas.addEventListener("touchstart", (e) => {
    e.preventDefault();
    handleStart(...Object.values(getMousePos(e.touches[0])));
});
canvas.addEventListener("touchmove", (e) => {
    e.preventDefault();
    handleMove(...Object.values(getMousePos(e.touches[0])));
});
canvas.addEventListener("touchend", (e) => {
    e.preventDefault();
    handleEnd(...Object.values(getMousePos(e.changedTouches[0])));
});

canvas.addEventListener("dragstart", (e) => e.preventDefault());
document.addEventListener("selectstart", (e) => e.preventDefault());
window.addEventListener("resize", resizeCanvas);
resizeCanvas();
