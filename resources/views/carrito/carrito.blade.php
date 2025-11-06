<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <title>Antojitos Estudiantiles</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #000000ff;
      color: #ffffff;
      margin: 0;
    }

    .header {
      background: #206148ff;
      color: white;
      display: flex;
      justify-content: space-between;
      padding: 1rem 2rem;
      align-items: center;
      color: #ffff;
      
      
    }
    header button{
      border: none;
      border-radius: 50px;
      background: #24684eff;
      cursor: pointer;
      margin: 10px;
      color: #fff;
      padding: 12px 22px;
    }

    .contenedor {
      padding: 20px;
      
    }
    .contenedor input{
      border: none;
      border-radius: 50px;
      background: #ffffffff;
      cursor: pointer;
      margin: 10px;
      padding: 15px 92px;
    }

    .productos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
      margin-top: 20px;
      
      
    }

    .producto {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      cursor: pointer;
      transition: transform 0.2s;
      box-shadow: 0 0 5px rgba(255, 255, 255, 0.1);
      background: #24684eff;
      color: #f8f8f8ff;
    }

    .producto:hover { transform: scale(1.03); }

    .producto img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      
    }

    .producto h3 { margin: 10px; }

    /* -------- Modal Detalle Producto -------- */
    .modal {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }

    .modal-contenido {
      background: white;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      position: relative;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      background: #24684eff;
      color: #ffffff;
    }

    .cerrar {
      position: absolute;
      top: 10px; right: 15px;
      cursor: pointer;
      font-size: 20px;
      color: #666;
    }

    .cantidad button {
      background: #ddd;
      border: none;
      padding: 5px 10px;
      margin: 5px;
      cursor: pointer;
    }

    .modal-contenido img {
      width: 100%;
      max-width: 250px;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      display: block;
      margin: 0 auto 15px auto;
    }

    /* -------- Modal Carrito -------- */
    .modal-carrito {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1100;
    }

    .contenido-carrito {
      background: #8f6035ff;
      width: 90%;
      max-width: 600px;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      position: relative;
      max-height: 90%;
      overflow-y: auto;
      color: #ffffff;
    }

    .cerrar-carrito {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 20px;
      cursor: pointer;
      color: #555;
    }

    .item-carrito {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    .item-carrito img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 8px;
    }

    .info-carrito {
      flex: 1;
      margin-left: 10px;
      text-align: left;
    }

    .btn-eliminar {
      background: #db8192ff;
      color: black;
      border: none;
      padding: 5px 8px;
      border-radius: 5px;
      cursor: pointer;
    }

    .resumen {
      text-align: right;
      margin-top: 15px;
    }

    .resumen p, .resumen h3 {
      margin: 5px 0;
    }

    .btn-pago {
      background: #fafafaff;
      color: black;
      border: none;
      padding: 10px 15px;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
      width: 100%;
    }

    .oculto { display: none; }
  </style>
</head>
<body>
  <header class="header">
    <h1>🍴 Cafe Sofft</h1>
    <button id="btnCarrito">🛒 Carrito (<span id="contadorCarrito">0</span>)</button>
  </header>

  <main class="contenedor">
    <h2>Menú de Cafetería</h2>
    <input type="text" id="buscador" placeholder="Buscar productos..." />
    <div id="listaProductos" class="productos"></div>
  </main>

  <!-- Modal Detalle Producto -->
  <div id="modalProducto" class="modal oculto">
    <div class="modal-contenido">
      <span id="cerrarModal" class="cerrar">&times;</span>
      <img id="modalImagen" src="" alt="">
      <h3 id="modalNombre"></h3>
      <p id="modalDescripcion"></p>
      <h4 id="modalPrecio"></h4>
      <div class="cantidad">
        <button id="menos">-</button>
        <span id="cantidad">1</span>
        <button id="mas">+</button>
      </div>
      <button id="agregarCarrito">Agregar al Carrito</button>
    </div>
  </div>

  <!-- Modal Carrito -->
  <div id="modalCarrito" class="oculto">
    <h2>Tu carrito 🛍️</h2>
    <div id="listaCarrito"></div>
    <p id="totalCarrito"></p>
    <button id="btnPagar">💳 Proceder al pago</button>
    <button id="btnCerrarCarrito">Cerrar</button>
  </div>

  <!-- Modal Pago -->
  <div id="modalPago" class="oculto">
    <div class="modal-contenido">
      <h2>💰 Selecciona tu método de pago</h2>
      <button id="pagoEfectivo">Pago en efectivo</button>
      <button id="pagoTarjeta">Pago con tarjeta</button>
      <button id="btnCerrarPago">Cancelar</button>
    </div>
  </div>

  <script>
  document.addEventListener("DOMContentLoaded", () => {
    // ======================================================
    // 🔹 VARIABLES GLOBALES
    // ======================================================
    let productos = [];
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    let productoSeleccionado = null;
    let cantidad = 1;

    // 🔹 ELEMENTOS DEL DOM
    const listaProductos = document.getElementById("listaProductos");
    const modalProducto = document.getElementById("modalProducto");
    const modalCarrito = document.getElementById("modalCarrito");
    const modalPago = document.getElementById("modalPago");
    const contadorCarrito = document.getElementById("contadorCarrito");

    // ======================================================
    // ✅ FUNCIONES BASE
    // ======================================================
    const actualizarContador = () => {
      contadorCarrito.textContent = carrito.reduce((acc, p) => acc + p.cantidad, 0);
    };

    async function cargarProductos() {
      try {
        const response = await fetch("http://localhost:3000/productos");
        if (!response.ok) throw new Error("Error al obtener productos");
        productos = await response.json();
        renderProductos();
      } catch (error) {
        console.error("Error al cargar productos:", error);
        listaProductos.innerHTML = "<p>Error al cargar los productos.</p>";
      }
    }

    const renderProductos = () => {
      listaProductos.innerHTML = "";
      productos.forEach(p => {
        const card = document.createElement("div");
        card.classList.add("producto");
        card.innerHTML = `
          <img src="${p.imagen}" alt="${p.nombre}">
          <h3>${p.nombre}</h3>
          <p>$MX${p.precio}</p>
        `;
        card.addEventListener("click", () => abrirModal(p));
        listaProductos.appendChild(card);
      });
    };

    const abrirModal = (producto) => {
      modalProducto.classList.remove("oculto");
      productoSeleccionado = producto;
      document.getElementById("modalImagen").src = producto.imagen;
      document.getElementById("modalNombre").textContent = producto.nombre;
      document.getElementById("modalDescripcion").textContent = producto.descripcion;
      document.getElementById("modalPrecio").textContent = `$MX${producto.precio}`;
      cantidad = 1;
      document.getElementById("cantidad").textContent = cantidad;
    };

    // ======================================================
    // 🛒 AGREGAR AL CARRITO
    // ======================================================
    document.getElementById("agregarCarrito").addEventListener("click", () => {
      if (!productoSeleccionado) return alert("No se ha seleccionado ningún producto.");

      const existe = carrito.find(item => item.id === productoSeleccionado.id);
      if (existe) {
        existe.cantidad += cantidad;
      } else {
        carrito.push({ ...productoSeleccionado, cantidad });
      }

      localStorage.setItem("carrito", JSON.stringify(carrito));
      actualizarContador();
      modalProducto.classList.add("oculto");
      alert(`✅ ${productoSeleccionado.nombre} agregado al carrito`);
    });

    // ======================================================
    // 🛍️ MOSTRAR CARRITO
    // ======================================================
    const mostrarCarrito = () => {
      const listaCarrito = document.getElementById("listaCarrito");
      listaCarrito.innerHTML = "";

      if (carrito.length === 0) {
        listaCarrito.innerHTML = "<p>Tu carrito está vacío 🛒</p>";
        document.getElementById("totalCarrito").textContent = "";
        return;
      }

      carrito.forEach(item => {
        const div = document.createElement("div");
        div.classList.add("item-carrito");
        div.innerHTML = `
          <img src="${item.imagen}" alt="${item.nombre}" width="60">
          <div>
            <h4>${item.nombre}</h4>
            <p>$MX${item.precio} x ${item.cantidad} = <strong>$MX${item.precio * item.cantidad}</strong></p>
          </div>
        `;
        listaCarrito.appendChild(div);
      });

      const total = carrito.reduce((acc, item) => acc + item.precio * item.cantidad, 0);
      document.getElementById("totalCarrito").textContent = `Total: $MX${total}`;
    };

    document.getElementById("btnCarrito").addEventListener("click", () => {
      mostrarCarrito();
      modalCarrito.classList.remove("oculto");
    });

    document.getElementById("btnCerrarCarrito").addEventListener("click", () => {
      modalCarrito.classList.add("oculto");
    });

    // ======================================================
    // 💳 PAGO Y TICKET
    // ======================================================
    document.getElementById("btnPagar").addEventListener("click", () => {
      if (carrito.length === 0) return alert("El carrito está vacío.");
      modalCarrito.classList.add("oculto");
      modalPago.classList.remove("oculto");
    });

    // 🔹 Confirmar pago (efectivo o tarjeta)
    const confirmarPago = (metodo) => {
      modalPago.classList.add("oculto");

      // Imprimir ticket automáticamente
      let ticket = "🧾 Café Sofft - Ticket de compra\n\n";
      ticket += `Método de pago: ${metodo}\n\n`;
      carrito.forEach(item => {
        ticket += `${item.nombre} - $${item.precio} x ${item.cantidad} = $${item.precio * item.cantidad}\n`;
      });

      const total = carrito.reduce((acc, item) => acc + item.precio * item.cantidad, 0);
      ticket += `\nTotal: $${total}\n\nGracias por tu compra ☕`;

      const ventana = window.open("", "_blank");
      ventana.document.write(`<pre>${ticket}</pre>`);
      ventana.print();
      ventana.close();

      carrito = [];
      localStorage.removeItem("carrito");
      actualizarContador();
    };

    document.getElementById("pagoEfectivo").addEventListener("click", () => confirmarPago("Efectivo"));
    document.getElementById("pagoTarjeta").addEventListener("click", () => confirmarPago("Tarjeta"));

    document.getElementById("btnCerrarPago").addEventListener("click", () => {
      modalPago.classList.add("oculto");
      modalCarrito.classList.remove("oculto");
    });

    // ======================================================
    // 🚀 INICIALIZACIÓN
    // ======================================================
    cargarProductos();
    actualizarContador();
  });
  </script>
</body>

</html>
