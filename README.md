# Orders API

Mini servicio de pedidos construido con Laravel. Gestiona pedidos via REST,
los procesa en segundo plano mediante colas y consume una API externa.

---

## Requisitos

- PHP 8+
- Composer
- MySQL

---

## Instalación

```bash
git clone https://github.com/parisandradelux/orders-api.git
cd orders-api
composer install
cp .env.example .env
php artisan key:generate
```

Configura tu base de datos en el `.env` y asegúrate de establecer:

```env
QUEUE_CONNECTION=database
```

Una vez configurada la base de datos, ejecuta las migraciones:

```bash
php artisan migrate
```

---

## Correr el proyecto

```bash
# Terminal 1 — Servidor
php artisan serve

# Terminal 2 — Worker de colas
php artisan queue:work
```

---

## Endpoints

| Método | Ruta               | Descripción              |
| ------ | ------------------ | ------------------------ |
| POST   | `/api/orders`      | Crear un pedido          |
| GET    | `/api/orders`      | Listar todos los pedidos |
| GET    | `/api/orders/{id}` | Ver un pedido específico |

---

### Ejemplo POST /api/orders

```json
{
    "customer_name": "Paris Andrade",
    "customer_email": "parisandradelux@gmail.com",
    "total_amount": 600
}
```

## Vista de pedidos

Accede a la raíz del proyecto para ver todos los pedidos:

```bash
http://localhost:8000
```
