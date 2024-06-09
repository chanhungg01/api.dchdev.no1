<?php

//Làm mới màn hình
system('clear');

echo "\e[1m\e[32m[TOOL BY DCHDEV]\e[0m\n";
echo "Bạn sẽ được chuyển hướng đến tool chính\n";
echo "Nhấn Enter để tiếp tục...\n";
fgets(STDIN);

// URL chứa URL của mã nguồn
$codeUrlUrl = "https://raw.githubusercontent.com/chanhungg01/key/main/url.txt";

// Lấy URL của mã nguồn từ URL
$codeUrl = file_get_contents($codeUrlUrl);

if ($codeUrl === false) {
    echo "\e[1m\e[31mLỗi: Không thể lấy URL của mã nguồn từ $codeUrlUrl\e[0m\n";
    exit(1);
}

// Lấy mã nguồn từ URL vừa lấy được
$sourceCode = file_get_contents(trim($codeUrl));

if ($sourceCode === false) {
    echo "\e[1m\e[31mLỗi: Không thể lấy mã nguồn từ $codeUrl\e[0m\n";
    exit(1);
}

// Tạo một file tạm thời để lưu mã nguồn vừa lấy
$tempFile = tempnam(sys_get_temp_dir(), 'tool_') . '.php';
file_put_contents($tempFile, $sourceCode);

// Chạy mã nguồn từ file tạm thời
include $tempFile;

// Xóa file tạm thời sau khi chạy xong
unlink($tempFile);
?>
