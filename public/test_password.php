<?php
$hash = '$2y$10$mH5PmgvZPudA85Qe.YFAHOonUxgkxzEQVeCJBItxLKgWRXkIXxHlq'; // Ganti dengan hash dari database

if (password_verify('admin123', $hash)) {
    echo "Password cocok!";
} else {
    echo "Password TIDAK cocok!";
}
?>
