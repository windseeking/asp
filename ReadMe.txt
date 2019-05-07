Так как у меня нет данных вашего хостинга, здесь перечислены файлы и операции, необходимые для того, чтобы сайт заработал на
вашем хостинге.

system/config.php
Заменить данные хостинга на свои

sql/schema.sql
   /queries.sql
Выполнить файлы для создания и заполнения базы данных

php.ini
Установить размер файлов, который устроит вас

init.php
Удалить строчки (указаны)

public/become-member.php
      /forgot-password.php
      /get-confirmation-link.php
      /index.php
      /register.php
Заполнить данные почтового сервера (указаны конкретные места)

public/templates/confirmation-email.php
                /contact-email.php
                /membership-request-email.php
                /reset-password-email.php
Добавить ссылку на сайт (указано место)
