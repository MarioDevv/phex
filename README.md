# Phex

> ⚠️ **Phex is in an early stage of development.**  
> Things might change — contributions and feedback are welcome!

**Phex** is a lightweight PHP starter structure focused on **Domain-Driven Design (DDD)** and **Hexagonal Architecture**.  
It is not a full framework — instead, it's a minimal base structure that helps you **start real projects fast**  
by avoiding unnecessary dependencies, configuration files, and excessive boilerplate code.

---

## ✨ Why Phex?

Frameworks like Laravel or Symfony are powerful, but they often come with:

- Heavy layers of infrastructure  
- Complex bootstrapping  
- Opinionated conventions that don't always match clean DDD  

**Phex offers a clean foundation where you control the architecture from day one.**

---

## 🚀 Features

- ✅ PSR-4 compliant structure  
- 🧩 Ready for DDD (`Application`, `Domain`, `Infrastructure`, `Shared`)  
- 🛡️ Hexagonal design with clear separation of concerns  
- 🧪 In-memory repositories for unit and acceptance testing  
- 🧼 No database or HTTP layer by default  
- 🧪 100% testable with PHPUnit  
- 🔌 Easy integration with Slim, Laravel, Symfony Console, etc.

---

## 🧱 Structure

```
src/
├── Application        # Use cases / Application services
├── Domain
│   └── Model          # Entities, ValueObjects, Repositories, Exceptions
├── Infrastructure
│   ├── Delivery       # API, CLI, Web, etc.
│   ├── Persistence    # DB, Redis, Filesystem, etc.
│   └── Domain
│       └── Model      # Implementations of domain interfaces
└── Shared             # Cross-cutting concerns (UUIDs, errors, etc.)
```

---

## 🔮 Tests

```
tests/
├── Unit               # Pure unit tests
├── Acceptance         # High-level use case tests
└── Shared             # Test data builders, mothers, fakes
```

---

## 💡 Usage

Clone this repository to start your own DDD module or microservice:

```bash
git clone https://github.com/MarioDevv/phex.git
cd my-project
composer install
```

Start coding your first module in `src/` and implement your use cases inside `Application/`.

---

## 📦 Who is this for?

- Developers who want full control over their app architecture  
- People applying DDD and Hexagonal Architecture in real PHP projects  
- Teams building microservices, APIs, or CLI tools without full frameworks  
- Anyone tired of unnecessary boilerplate

---

## 🤝 Contributing

Feel free to fork, improve and submit PRs.  
**This is a starting point, not the final word.**

---

¿Quieres que te ayude a convertir esto en un `README.md` listo para el repo o agregar una sección como "Roadmap" o "Limitaciones actuales"?
