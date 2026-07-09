const PRODUCTS = [
  {
    id: "r1",
    title: "Dual‑Band WiFi Router AC1200",
    category: "networking",
    meta: "Imported • 2.4/5GHz • 4 antennas",
    price: 5499,
    badge: "Hot",
    img: "./static/img/Router.jpg",
  },
  {
    id: "l1",
    title: 'Laptop 14" i5 (Refurb)',
    category: "laptops",
    meta: "8GB RAM • 256GB SSD • Warranty",
    price: 68999,
    badge: "Deal",
    img: "./static/img/Laptop.jpg",
  },
  {
    id: "m1",
    title: 'Monitor 24" IPS 75Hz',
    category: "monitors",
    meta: "Full HD • HDMI • Slim bezel",
    price: 27999,
    badge: "New",
    img: "./static/img/Monitor.jpg",
  },
  {
    id: "a1",
    title: "Power Gaming Mouse RGB",
    category: "accessories",
    meta: "Adjustable DPI • Braided cable",
    price: 1999,
    badge: "Top",
    img: "./static/img/Power Gaming Mouse.jpg",
  },
  {
    id: "a2",
    title: "USB‑C Hub 6‑in‑1",
    category: "accessories",
    meta: "HDMI • USB 3.0 • Ethernet",
    price: 2999,
    badge: "Pro",
    img: "./static/img/UtechSmart USB C Hub, USB C Ethernet Multiport Adapter, 6 In 1 USB C.jpg",
  },
  {
    id: "r2",
    title: "WiFi Repeater 300Mbps",
    category: "networking",
    meta: "WPS • Coverage extender",
    price: 2199,
    badge: "Value",
    img: "./static/img/Repetidor WIFI .jpg",
  },
];

const PROMOS = [
  { title: "Up to 25% off", sub: "Smart appliances & accessories" },
  { title: "Bundle deals", sub: "Router + cables + setup" },
  { title: "Limited stock", sub: "Imported monitors & laptops" },
];

function formatPKR(amount) {
  try {
    return new Intl.NumberFormat("en-PK", {
      style: "currency",
      currency: "PKR",
      maximumFractionDigits: 0,
    }).format(amount);
  } catch {
    return `Rs ${amount.toLocaleString("en-US")}`;
  }
}

function qs(sel, root = document) {
  return root.querySelector(sel);
}

function qsa(sel, root = document) {
  return Array.from(root.querySelectorAll(sel));
}

function setYear() {
  const year = new Date().getFullYear();
  qsa("[data-year]").forEach((el) => (el.textContent = String(year)));
}

function renderProducts(category = "all") {
  const grid = qs("[data-product-grid]");
  if (!grid) return;

  const items =
    category === "all" ? PRODUCTS : PRODUCTS.filter((p) => p.category === category);

  grid.innerHTML = items
    .map(
      (p) => `
      <article class="product" aria-label="${escapeHtml(p.title)}">
        <div class="product-media">
          ${
            p.img
              ? `<img class="product-img" src="${escapeHtml(encodeURI(p.img))}" alt="${escapeHtml(
                  p.title
                )}" loading="lazy" />`
              : ""
          }
          <span class="product-badge">${escapeHtml(p.badge)}</span>
        </div>
        <div class="product-body">
          <h3 class="product-title">${escapeHtml(p.title)}</h3>
          <div class="product-meta">${escapeHtml(p.meta)}</div>
        </div>
        <div class="product-foot">
          <div class="price">${escapeHtml(formatPKR(p.price))}</div>
          <button class="btn btn-primary btn-sm" type="button" data-open-product data-id="${p.id}">
            Add to Cart
          </button>
        </div>
      </article>
    `
    )
    .join("");
}

function bindChips() {
  const chips = qs("[data-chips]");
  if (!chips) return;

  chips.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-chip]");
    if (!btn) return;

    qsa("[data-chip]", chips).forEach((b) => b.classList.remove("is-active"));
    btn.classList.add("is-active");
    renderProducts(btn.getAttribute("data-chip") || "all");
  });
}

function bindSearch() {
  const form = qs("[data-search]");
  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const input = qs('input[type="search"]', form);
    const q = (input?.value || "").trim().toLowerCase();
    if (!q) {
      toast("Type something to search.");
      return;
    }
    toast(`Search is demo-only. You searched: “${q}”`);
  });
}

function bindDrawer() {
  const drawer = qs("[data-drawer]");
  if (!drawer) return;

  const openers = qsa("[data-drawer-open]");
  const closers = qsa("[data-drawer-close]", drawer);
  const setOpen = (open) => {
    drawer.classList.toggle("is-open", open);
    drawer.setAttribute("aria-hidden", open ? "false" : "true");
    document.documentElement.style.overflow = open ? "hidden" : "";
  };

  openers.forEach((btn) => btn.addEventListener("click", () => setOpen(true)));
  closers.forEach((btn) => btn.addEventListener("click", () => setOpen(false)));
  drawer.addEventListener("click", (e) => {
    if (e.target === drawer) setOpen(false);
  });
  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setOpen(false);
  });
}

function bindSigninModal() {
  const modal = qs("[data-signin-modal]");
  if (!modal) return;

  const openers = qsa("[data-open-signin]");
  const closers = qsa("[data-close-signin]", modal);

  const setOpen = (open) => {
    modal.classList.toggle("is-open", open);
    modal.setAttribute("aria-hidden", open ? "false" : "true");
  };

  openers.forEach((btn) =>
    btn.addEventListener("click", (e) => {
      e.preventDefault?.();
      setOpen(true);
    })
  );
  closers.forEach((btn) => btn.addEventListener("click", () => setOpen(false)));

  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setOpen(false);
  });

  const form = qs("[data-signin-form]", modal);
  const registerForm = qs("[data-register-form]", modal);

  const setTab = (tab) => {
    qsa("[data-auth-tab]", modal).forEach((btn) => {
      const active = btn.getAttribute("data-auth-tab") === tab;
      btn.classList.toggle("is-active", active);
    });
    qsa("[data-auth-pane]", modal).forEach((pane) => {
      const show = pane.getAttribute("data-auth-pane") === tab;
      pane.style.display = show ? "block" : "none";
    });
  };

  qsa("[data-auth-tab]", modal).forEach((btn) => {
    btn.addEventListener("click", () => {
      const tab = btn.getAttribute("data-auth-tab");
      if (tab) setTab(tab);
    });
  });

  qsa("[data-switch-tab]", modal).forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      const tab = btn.getAttribute("data-switch-tab");
      if (tab) setTab(tab);
    });
  });

  setTab("login");

  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      toast("Login request submitted (demo).");
      setOpen(false);
    });
  }
  if (registerForm) {
    registerForm.addEventListener("submit", (e) => {
      e.preventDefault();
      toast("Registration request submitted (demo).");
      setOpen(false);
    });
  }
}

function bindAddToCart() {
  document.addEventListener("click", (e) => {
    const openProduct = e.target.closest("[data-open-product]");
    if (openProduct) {
      const id = openProduct.getAttribute("data-id");
      if (id) window.location.href = `./product.html?id=${encodeURIComponent(id)}`;
      return;
    }

    const btn = e.target.closest("[data-add-to-cart]");
    if (!btn) return;
    const id = btn.getAttribute("data-id");
    addToCart(id, 1);
    const p = PRODUCTS.find((x) => x.id === id);
    toast(p ? `Added to cart: ${p.title}` : "Added to cart");
  });
}

function getProductById(id) {
  return PRODUCTS.find((p) => p.id === id) || null;
}

function getCurrentProductFromQuery() {
  try {
    const query = new URLSearchParams(window.location.search);
    const id = query.get("id");
    if (!id) return null;
    return getProductById(id);
  } catch {
    return null;
  }
}

function setCheckoutItem(product, qty = 1) {
  if (!product) return;
  const payload = { id: product.id, qty: Number(qty) || 1 };
  localStorage.setItem("hc_checkout_item", JSON.stringify(payload));
}

function getCheckoutItem() {
  try {
    const raw = localStorage.getItem("hc_checkout_item");
    if (!raw) return null;
    const parsed = JSON.parse(raw);
    if (!parsed?.id) return null;
    const product = getProductById(parsed.id);
    if (!product) return null;
    return { product, qty: Math.max(1, Number(parsed.qty) || 1) };
  } catch {
    return null;
  }
}

function setDeliveryInfo(data) {
  localStorage.setItem("hc_delivery_info", JSON.stringify(data || {}));
}

function getDeliveryInfo() {
  try {
    const raw = localStorage.getItem("hc_delivery_info");
    return raw ? JSON.parse(raw) : {};
  } catch {
    return {};
  }
}

function getCheckoutTotals() {
  const item = getCheckoutItem();
  if (!item) return null;
  const subtotal = item.product.price * item.qty;
  const shipping = 195;
  const platformFee = 10;
  return {
    item,
    subtotal,
    shipping,
    platformFee,
    total: subtotal + shipping + platformFee,
  };
}

function renderProductPage() {
  const wrap = qs("[data-product-detail]");
  if (!wrap) return;
  const product = getCurrentProductFromQuery();
  if (!product) {
    wrap.innerHTML = `<div class="card"><h1 class="h3">Product not found</h1><a class="btn btn-primary" href="./index.html#products">Back to products</a></div>`;
    return;
  }

  wrap.innerHTML = `
    <article class="pd-grid">
      <div class="card pd-image-wrap">
        <img class="pd-image" src="${escapeHtml(encodeURI(product.img || ""))}" alt="${escapeHtml(product.title)}" />
      </div>
      <div class="card pd-info">
        <div class="product-badge">${escapeHtml(product.badge)}</div>
        <h1 class="pd-title">${escapeHtml(product.title)}</h1>
        <p class="muted">${escapeHtml(product.meta)}</p>
        <div class="pd-price">${escapeHtml(formatPKR(product.price))}</div>
        <ul class="ticks pd-points">
          <li>Cash on Delivery available</li>
          <li>Delivery in 3-5 business days</li>
          <li>Original product warranty check</li>
        </ul>
        <div class="pd-actions">
          <button class="btn btn-ghost" type="button" data-add-to-cart data-id="${escapeHtml(product.id)}">Add to Cart</button>
          <button class="btn btn-primary" type="button" data-buy-now data-id="${escapeHtml(product.id)}">Buy Now</button>
        </div>
      </div>
    </article>
  `;
}

function bindProductPage() {
  document.addEventListener("click", (e) => {
    const buy = e.target.closest("[data-buy-now]");
    if (buy) {
      const id = buy.getAttribute("data-id");
      const product = getProductById(id || "");
      if (!product) return;
      setCheckoutItem(product, 1);
      window.location.href = "./checkout-delivery.html";
    }
  });
}

function bindDeliveryForm() {
  const form = qs("[data-delivery-form]");
  if (!form) return;

  const totals = getCheckoutTotals();
  if (!totals) {
    window.location.href = "./index.html#products";
    return;
  }

  const saved = getDeliveryInfo();
  qsa("input, select, textarea", form).forEach((field) => {
    const name = field.getAttribute("name");
    if (!name || !saved[name]) return;
    field.value = saved[name];
  });

  const totalEl = qs("[data-delivery-total]");
  if (totalEl) totalEl.textContent = formatPKR(totals.total);
  const itemTotalEl = qs("[data-delivery-item-total]");
  if (itemTotalEl) itemTotalEl.textContent = formatPKR(totals.subtotal);
  const shippingEl = qs("[data-delivery-shipping]");
  if (shippingEl) shippingEl.textContent = formatPKR(totals.shipping);

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const fd = new FormData(form);
    const fullName = String(fd.get("fullName") || "").trim();
    const phone = String(fd.get("phone") || "").trim();
    const province = String(fd.get("province") || "").trim();
    const city = String(fd.get("city") || "").trim();
    const address = String(fd.get("address") || "").trim();
    if (!fullName || !phone || !province || !city || !address) {
      toast("Please fill all required delivery fields.");
      return;
    }
    const data = Object.fromEntries(fd.entries());
    setDeliveryInfo(data);
    window.location.href = "./checkout-review.html";
  });
}

function renderCheckoutReview() {
  const wrap = qs("[data-checkout-review]");
  if (!wrap) return;
  const totals = getCheckoutTotals();
  if (!totals) {
    window.location.href = "./index.html#products";
    return;
  }
  const info = getDeliveryInfo();
  const name = info.fullName ? escapeHtml(info.fullName) : "Customer";
  const phone = info.phone ? escapeHtml(info.phone) : "Not provided";
  const address = [info.address, info.city, info.province].filter(Boolean).map(escapeHtml).join(", ");

  wrap.innerHTML = `
    <div class="card co-left">
      <h1 class="h3">Shipping & Billing</h1>
      <div class="co-address">
        <strong>${name}</strong>
        <div class="muted">${phone}</div>
        <div class="muted">${address || "Address not available"}</div>
      </div>
      <div class="co-package">
        <img class="cart-thumb" src="${escapeHtml(encodeURI(totals.item.product.img || ""))}" alt="${escapeHtml(totals.item.product.title)}" />
        <div>
          <div class="cart-title">${escapeHtml(totals.item.product.title)}</div>
          <div class="muted">Qty: ${totals.item.qty}</div>
        </div>
        <strong>${escapeHtml(formatPKR(totals.subtotal))}</strong>
      </div>
    </div>
    <aside class="card co-right">
      <h2 class="h3">Order Summary</h2>
      <div class="summary-row"><span class="muted">Items Total</span><strong>${escapeHtml(formatPKR(totals.subtotal))}</strong></div>
      <div class="summary-row"><span class="muted">Delivery Fee</span><strong>${escapeHtml(formatPKR(totals.shipping))}</strong></div>
      <div class="summary-row"><span class="muted">Platform Fee</span><strong>${escapeHtml(formatPKR(totals.platformFee))}</strong></div>
      <div class="summary-row summary-total"><span>Total</span><strong>${escapeHtml(formatPKR(totals.total))}</strong></div>
      <button class="btn btn-primary" style="width:100%;margin-top:14px;" type="button" data-proceed-pay>Proceed to Pay</button>
    </aside>
  `;
}

function bindCheckoutReview() {
  document.addEventListener("click", (e) => {
    const proceed = e.target.closest("[data-proceed-pay]");
    if (!proceed) return;
    window.location.href = "./checkout-payment.html";
  });
}

function renderPaymentPage() {
  const root = qs("[data-payment-root]");
  if (!root) return;
  const totals = getCheckoutTotals();
  if (!totals) {
    window.location.href = "./index.html#products";
    return;
  }
  const totalEl = qs("[data-payment-total]");
  if (totalEl) totalEl.textContent = formatPKR(totals.total);
}

function bindPaymentTabs() {
  const tabsWrap = qs("[data-payment-tabs]");
  const panes = qs("[data-payment-panes]");
  if (!tabsWrap || !panes) return;

  const setMethod = (method) => {
    qsa("[data-method]", tabsWrap).forEach((btn) => {
      btn.classList.toggle("is-active", btn.getAttribute("data-method") === method);
    });
    qsa("[data-method-pane]", panes).forEach((pane) => {
      pane.hidden = pane.getAttribute("data-method-pane") !== method;
    });
  };

  tabsWrap.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-method]");
    if (!btn) return;
    setMethod(btn.getAttribute("data-method") || "card");
  });

  panes.addEventListener("submit", (e) => {
    e.preventDefault();
    window.location.href = "./order-success.html";
  });

  setMethod("easypaisa");
}

function getCart() {
  try {
    const raw = localStorage.getItem("hc_cart");
    if (!raw) return {};
    const obj = JSON.parse(raw);
    return obj && typeof obj === "object" ? obj : {};
  } catch {
    return {};
  }
}

function setCart(cart) {
  localStorage.setItem("hc_cart", JSON.stringify(cart));
}

function cartCount(cart) {
  return Object.values(cart).reduce((sum, qty) => sum + (Number(qty) || 0), 0);
}

function updateCartBadges() {
  const cart = getCart();
  const count = cartCount(cart);
  qsa("[data-cart-count]").forEach((el) => {
    el.textContent = String(count);
    el.style.display = count > 0 ? "grid" : "none";
  });
}

function addToCart(id, qty) {
  const cart = getCart();
  cart[id] = (Number(cart[id]) || 0) + (Number(qty) || 0);
  if (cart[id] <= 0) delete cart[id];
  setCart(cart);
  updateCartBadges();
  renderCartPage();
}

function renderCartPage() {
  const root = qs("[data-cart-items]");
  if (!root) return;

  const cart = getCart();
  const entries = Object.entries(cart).filter(([, q]) => Number(q) > 0);

  if (entries.length === 0) {
    root.innerHTML = `
      <div class="empty-cart">
        <div class="muted">Your cart is empty.</div>
        <a class="btn btn-primary" href="./index.html#products">Continue shopping</a>
      </div>
    `;
    qsa("[data-cart-subtotal],[data-cart-total],[data-cart-shipping]").forEach((el) => {
      el.textContent = "Rs 0";
    });
    return;
  }

  const rows = entries
    .map(([id, qty]) => {
      const p = PRODUCTS.find((x) => x.id === id);
      if (!p) return "";
      return `
        <div class="cart-row" data-cart-row="${escapeHtml(id)}">
          <div class="cart-prod">
            <img class="cart-thumb" src="${escapeHtml(encodeURI(p.img || ""))}" alt="${escapeHtml(
        p.title
      )}" />
            <div>
              <div class="cart-title">${escapeHtml(p.title)}</div>
              <div class="cart-meta muted">${escapeHtml(p.meta)}</div>
            </div>
          </div>
          <div class="cart-price">${escapeHtml(formatPKR(p.price))}</div>
          <div class="cart-qty">
            <button class="qty-btn" type="button" data-qty-dec="${escapeHtml(id)}">−</button>
            <div class="qty-num">${escapeHtml(qty)}</div>
            <button class="qty-btn" type="button" data-qty-inc="${escapeHtml(id)}">+</button>
          </div>
          <button class="cart-remove" type="button" aria-label="Remove" data-remove="${escapeHtml(
            id
          )}">Remove</button>
        </div>
      `;
    })
    .join("");

  root.innerHTML = `
    <div class="cart-header">
      <div class="muted">Product</div>
      <div class="muted">Price</div>
      <div class="muted">Qty</div>
      <div class="muted"></div>
    </div>
    ${rows}
  `;

  const subtotal = entries.reduce((sum, [id, qty]) => {
    const p = PRODUCTS.find((x) => x.id === id);
    return sum + (p ? p.price * (Number(qty) || 0) : 0);
  }, 0);

  const shipping = subtotal > 0 ? 0 : 0;
  const total = subtotal + shipping;

  const subEl = qs("[data-cart-subtotal]");
  const shipEl = qs("[data-cart-shipping]");
  const totEl = qs("[data-cart-total]");
  if (subEl) subEl.textContent = formatPKR(subtotal);
  if (shipEl) shipEl.textContent = formatPKR(shipping);
  if (totEl) totEl.textContent = formatPKR(total);
}

function bindCartPage() {
  document.addEventListener("click", (e) => {
    const inc = e.target.closest("[data-qty-inc]")?.getAttribute("data-qty-inc");
    if (inc) return addToCart(inc, 1);

    const dec = e.target.closest("[data-qty-dec]")?.getAttribute("data-qty-dec");
    if (dec) return addToCart(dec, -1);

    const rem = e.target.closest("[data-remove]")?.getAttribute("data-remove");
    if (rem) {
      const cart = getCart();
      delete cart[rem];
      setCart(cart);
      updateCartBadges();
      renderCartPage();
      return;
    }

    const clearBtn = e.target.closest("[data-cart-clear]");
    if (clearBtn) {
      setCart({});
      updateCartBadges();
      renderCartPage();
      toast("Cart cleared.");
      return;
    }

    const coupon = e.target.closest("[data-apply-coupon]");
    if (coupon) {
      toast("Voucher applied (demo).");
      return;
    }

    const checkout = e.target.closest("[data-checkout]");
    if (checkout) {
      window.location.href = "./checkout-delivery.html";
      return;
    }
  });
}

function renderPromos() {
  const grid = qs("[data-promo-grid]");
  if (!grid) return;
  grid.innerHTML = PROMOS.map(
    (x) => `
    <div class="promo-tile">
      <div class="promo-tile-title">${escapeHtml(x.title)}</div>
      <div class="promo-tile-sub">${escapeHtml(x.sub)}</div>
    </div>
  `
  ).join("");
}

function bindForms() {
  const contact = qs("[data-contact-form]");
  if (contact) {
    contact.addEventListener("submit", (e) => {
      e.preventDefault();
      const fd = new FormData(contact);
      const first = String(fd.get("firstName") || "").trim();
      const email = String(fd.get("email") || "").trim();
      if (!first || !email) {
        toast("Please fill required fields.");
        return;
      }
      contact.reset();
      toast("Message sent (demo). We’ll reply soon on WhatsApp / email.");
    });
  }

  const sub = qs("[data-subscribe]");
  if (sub) {
    sub.addEventListener("submit", (e) => {
      e.preventDefault();
      const input = qs("input", sub);
      const v = (input?.value || "").trim();
      if (!v) {
        toast("Enter your email to subscribe.");
        return;
      }
      sub.reset();
      toast("Subscribed (demo).");
    });
  }
}

function bindHeroSlideshow() {
  const root = qs("[data-hero-slideshow]");
  if (!root) return;

  const slides = qsa(".hero-slide", root);
  if (slides.length < 2) return;

  let idx = 0;
  let timer = null;

  const show = (nextIdx) => {
    idx = (nextIdx + slides.length) % slides.length;
    slides.forEach((slide, i) => slide.classList.toggle("is-active", i === idx));
  };

  const start = () => {
    clearInterval(timer);
    timer = setInterval(() => show(idx + 1), 3000);
  };

  qs("[data-slide-prev]", root)?.addEventListener("click", () => {
    show(idx - 1);
    start();
  });

  qs("[data-slide-next]", root)?.addEventListener("click", () => {
    show(idx + 1);
    start();
  });

  root.addEventListener("mouseenter", () => clearInterval(timer));
  root.addEventListener("mouseleave", start);

  start();
}

let toastTimer = null;
function toast(message) {
  const el = qs("[data-toast]");
  if (!el) return;
  el.textContent = message;
  el.classList.add("is-open");
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => el.classList.remove("is-open"), 2600);
}

function escapeHtml(str) {
  return String(str)
    .replaceAll("&", "&amp;")
    .replaceAll("<", "&lt;")
    .replaceAll(">", "&gt;")
    .replaceAll('"', "&quot;")
    .replaceAll("'", "&#039;");
}

function init() {
  setYear();
  updateCartBadges();
  renderProducts("all");
  bindChips();
  bindSearch();
  bindDrawer();
  bindSigninModal();
  bindAddToCart();
  bindCartPage();
  renderCartPage();
  renderPromos();
  bindForms();
  renderProductPage();
  bindProductPage();
  bindDeliveryForm();
  renderCheckoutReview();
  bindCheckoutReview();
  renderPaymentPage();
  bindPaymentTabs();
  bindHeroSlideshow();
}

document.addEventListener("DOMContentLoaded", init);

