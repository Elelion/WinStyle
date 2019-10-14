# Проект WinStyle

## Задание:
Написать приложение для хранении данных о зарплате сотрудников.
### MySQL
•	Написать запросы:<br>
•	Создать справочник "professions". Добавить профессии: бухгалтер, курьер, менеджер.<br>
•	Создать таблицу "workers". Структура: ключевое поле, имя, фамилия, должность, зарплата, ссылка на фото.<br>
•	Создать таблицу "payment". Таблица будет хранить зарплату сотрудников с учетом премии. Зарплату храним отдельно за каждый месяц.<br>
•	Добавить 15 сотрудников. Использовать справочник профессий. Колонку с зарплатой рассчитать в случайном порядке.<br>

`Заметка:`<br>
PHP + HTML + CSS + JS – вывод зарплат сотрудников.
PHP код писать с нуля, без использования фреймворков.

### Сверстать страницу
• Вывести данные из таблицы workers, включая миниатюры фото. Зарплату выводим за текущий, либо указанный месяц.<br>
•	Для выбора месяца вывести на странице любой календарь.<br>
•	При клике на фото сотрудника, открыть его для увеличенного просмотра(использовать любой JQuery плагин)<br>

### Реализовать дополнительный функционал
•	Возможность добавлять сотрудников. `- реализовано частично, намеренно`<br>
•	Загрузка фото сотрудников на сервер. При загрузке фото, автоматически создавать миниатюру. `- не реализовано намеренно`<br>
•	Загрузка текущего курса доллара и переключение отображения зарплаты: рубли/доллары. `- реализовано частично, намеренно`<br>
•	Возможность выдать премию за указанный месяц всем сотрудникам выбранной профессии. `- не реализовано намеренно`<br>

*PS: дополнительный функционал реализоан частично - намеренно, ну так... На свякий случай ☺*