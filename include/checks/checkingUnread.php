<!-- ПРОВЕРКА ЕСТЬ ЛИ НЕПРОЧИТАННЫЕ СМС ИЛИ НЕЗАБРАННЫЕ ДОСТИЖЕНИЯ -->
<?php
session_start();

$has_unread = false;

if (isset($_SESSION['id'])) {
   $user_id = $_SESSION['id'];

   $query = $pdo->prepare("SELECT COUNT(*) FROM user_achievements WHERE user_id = :user_id AND status = 'completed' AND (reward_claimed = 0 OR reward_claimed IS NULL)");
   $query->execute(['user_id' => $user_id]);
   $unclaimed_achievements = $query->fetchColumn();

   $unread_messages = 0; // можно расширить позже

   if ($unclaimed_achievements > 0 || $unread_messages > 0) {
      $has_unread = true;
   }
}
?>

<script>

   const hasUnread = <?php echo json_encode($has_unread); ?>;
   if (hasUnread) {
      document.querySelector('.unread-mark').style.display = 'block';
   }
</script>