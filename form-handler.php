<?php
// YG Dental Smile - booking form handler. Upload next to index.html on PHP hosting.
$to = "ysygamboa23@yahoo.com";
header("Content-Type: application/json");
if ($_SERVER["REQUEST_METHOD"] !== "POST") { http_response_code(405); echo '{"ok":false}'; exit; }
function clean($k, $max = 300) {
  $v = isset($_POST[$k]) ? trim((string)$_POST[$k]) : "";
  $v = str_replace(["\r", "\n"], " ", $v);
  return mb_substr(strip_tags($v), 0, $max);
}
$name = clean("n", 100); $phone = clean("p", 40);
if ($name === "" || $phone === "") { http_response_code(400); echo '{"ok":false}'; exit; }
$email = filter_var(clean("e", 120), FILTER_VALIDATE_EMAIL) ?: "";
$body = "New consultation request\n\n"
  . "Visit type: " . clean("v") . "\nName: $name\nPhone: $phone\nEmail: $email\n"
  . "Service: " . clean("s") . "\nPreferred: " . clean("d") . " " . clean("t") . "\n"
  . "Notes: " . clean("m", 1000) . "\n";
$headers = "Content-Type: text/plain; charset=UTF-8\r\n";
if ($email) { $headers .= "Reply-To: $email\r\n"; }
$ok = mail($to, "New booking request - $name", $body, $headers);
http_response_code($ok ? 200 : 500);
echo json_encode(["ok" => $ok]);
