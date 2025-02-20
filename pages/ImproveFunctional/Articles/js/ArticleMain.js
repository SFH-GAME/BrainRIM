document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".button");
    const articles = document.querySelectorAll(".block");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            let filter = button.getAttribute("data-filter");

            // Убираем активный класс у всех кнопок и добавляем только на кликнутую
            buttons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");

            // Фильтруем статьи
            articles.forEach(article => {
                let categories = article.getAttribute("data-category").split(" "); // Делаем массив категорий
                if (filter === "all" || categories.includes(filter)) {
                    article.style.display = "flex"; // Показываем блок
                    setTimeout(() => article.style.opacity = "1", 10); // Плавное появление
                } else {
                    article.style.opacity = "0"; // Плавное исчезновение
                    setTimeout(() => article.style.display = "none", 300); // Убираем после анимации
                }
            });
        });
    });
});