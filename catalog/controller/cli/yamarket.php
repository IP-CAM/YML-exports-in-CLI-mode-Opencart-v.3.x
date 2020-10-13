<?php
    define('DIR_ROOT', '/var/www/mysite/www/mysite.ru/');
    require(DIR_APPLICATION . 'controller/extension/payment/yandex_money.php');

    class ControllerCliYamarket extends ControllerExtensionPaymentYandexMoney {
        private $save_result = FALSE;
        private $start_time = FALSE;
        private $end_time = FALSE;
        private $filename = DIR_ROOT . '3a568f5f39cbe3.yml';

        public function index() {
            // Отметка времени начала экспорта
            $this->start_time = time();

            // Получаем YML-файл
            $yml = $this->market();

            // Записываем YML-файл
            $this->save_result = file_put_contents($this->filename, $yml);

            // Отметка времени конца экспорта
            $this->end_time = time();

            // Удаляем переменную, содержащую YML
            unset($yml);

            // Отправляем отчет в Телеграм
            $this->sendReport();
        }

        protected function sendReport() {
            $message = "";

            $message .= "<b>Формирование YML-файла:</b>\n";
            $message .= "Время выполнения: " . ($this->end_time - $this->start_time) . " сек.\n";
            if($this->save_result !== FALSE) {
                $message .= "Файл успешно сохранен: " . $this->filename . "\n";
            } else {
                $message .= "Ошибка сохранения файла: " . "\n";
            }

            $message .= "\n";

            // Отчет по информации из YML

            $apiToken = "00000000:AAHCsd855df45554dddfefFwOk";

            $data = [
                'chat_id' => '-1009999999999',
                'chat_type' => 'private',
                'text' => $message,
                'parse_mode' => 'HTML'
            ];
            
            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

            unset($data);
            unset($message);
            unset($response);

            return TRUE;
        }
    }
?>