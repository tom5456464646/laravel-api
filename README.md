# Laravel API Sync Project

## Описание
Проект на Laravel 8 для синхронизации и хранения данных с внешнего API:
- Продажи (`sales`)
- Заказы (`orders`)
- Склады (`stocks`)
- Доходы (`incomes`)

Данные автоматически выгружаются через Artisan команды и сохраняются в базу данных.

---

## Стек
- PHP 8.1
- Laravel 8
- Laravel Octane (опционально)
- MySQL (FreeSQLDatabase)
- Docker / Docker-Compose (опционально)
- Bootstrap + Blade для интерфейса просмотра данных

---

## Доступы к базе данных (FreeSQLDatabase)
- **Хост:** sql12.freesqldatabase.com  
- **Порт:** 3306  
- **База:** sql12796208  
- **Пользователь:** sql12796208  
- **Пароль:** ZkCcghqWVW  

> Обратите внимание: для работы на локальной машине нужно подключение к интернету.

---

##Работа с Artisan командами

- Продажи: php artisan fetch:sales --from=2025-08-01 --to=2025-08-26
- Заказы: php artisan fetch:orders --from=2025-08-01 --to=2025-08-26
- Склады (только текущий день): php artisan fetch:stocks --from=2025-08-26
- php artisan fetch:incomes --from=2025-08-01 --to=2025-08-26

---

Просмотр данных через веб-интерфейс (опционально)

Перейти по URL: http://localhost:8000/data/sales

Для других таблиц: /data/orders, /data/stocks, /data/incomes


## Настройка проекта

1. Склонировать репозиторий:

```bash
git clone https://github.com/tom5456464646/laravel-api.git
cd laravel-api/api-sync
