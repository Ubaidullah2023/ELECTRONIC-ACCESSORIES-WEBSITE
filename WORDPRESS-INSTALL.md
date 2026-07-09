# WordPress Installation Guide — Hassan Computer

Yeh guide aap ko batati hai ke **Theme** aur **Plugin** WordPress mein kaise upload aur activate karein.

## Files kahan hain?

| Item | Folder |
|------|--------|
| **Theme** | `hassancomputer.zip` (project root) ya `wp-theme/hassancomputer/` folder |
| **Plugin** | `hassancomputer-shop.zip` (project root) ya `wp-plugin/hassancomputer-shop/` folder |

---

## Step 1: ZIP banayein (upload ke liye)

### Theme ZIP
1. **Sirf** `wp-theme/hassancomputer` folder ko zip karein (poora `wp-theme` ya project folder **nahi**)
2. Right-click `hassancomputer` folder → **Send to → Compressed (zipped) folder**
3. Ya ready-made file use karein: **`hassancomputer.zip`** (project root mein)

ZIP ke andar structure aisa hona chahiye:
```
hassancomputer/
  style.css          ← yeh file zaroor honi chahiye
  functions.php
  header.php
  ...
```

**Galat (error aayega):**
```
wp-theme/hassancomputer/style.css   ❌
HassanComputer Website/wp-theme/... ❌
```

### Plugin ZIP
1. **Sirf** `wp-plugin/hassancomputer-shop` folder ko zip karein
2. Ya ready-made file use karein: **`hassancomputer-shop.zip`**

> **Important:** ZIP ke andar seedha `hassancomputer` ya `hassancomputer-shop` folder hona chahiye — uske andar `style.css` / main plugin file honi chahiye.

---

## Step 2: WordPress Admin mein upload

### Theme upload
1. WordPress Admin → **Appearance → Themes**
2. **Add New → Upload Theme**
3. `hassancomputer.zip` select karein → **Install Now**
4. **Activate** karein

### Plugin upload
1. WordPress Admin → **Plugins → Add New**
2. **Upload Plugin**
3. `hassancomputer-shop.zip` select karein → **Install Now**
4. **Activate** karein

---

## Step 3: Plugin activate hone par automatic setup

Plugin activate hone par yeh automatically ho jata hai:

- 6 sample products add hote hain
- Saari pages ban jati hain (Home, Contact, Cart, Checkout, etc.)
- **Home** page front page set ho jati hai
- Primary menu create ho jata hai

Agar pages pehle se maujood hon to duplicate nahi bante.

---

## Step 4: Settings check karein

1. **Settings → Reading** — "A static page" selected ho aur **Home** front page ho
2. **Settings → Permalinks** — **Post name** select karein → Save
3. **Appearance → Menus** — Primary menu assign ho chuka hoga

---

## Step 5: Products manage karein

WordPress Admin → **Products** (left sidebar)

Har product mein:
- **Price (PKR)**
- **Badge** (Hot, Deal, New...)
- **Product ID** (cart ke liye, e.g. `r1`)
- **Category** (Laptops, Monitors, Networking, Accessories)

---

## Step 6: Orders dekhein

Customer jab checkout complete kare to order yahan save hota hai:

**Products → Orders**

Admin email par bhi notification jati hai.

---

## FTP se upload (alternative)

Agar ZIP upload na ho to FTP/cPanel File Manager se:

```
/wp-content/themes/hassancomputer/     ← theme files
/wp-content/plugins/hassancomputer-shop/  ← plugin files
```

Phir Admin se activate karein.

---

## Troubleshooting

| Problem | Solution |
|---------|----------|
| Pages 404 error | Settings → Permalinks → Save Changes |
| Products nahi dikhte | Plugin activate karein, Products menu check karein |
| Images nahi load | Theme `assets/img/` folder upload verify karein |
| Contact form email nahi aati | SMTP plugin install karein (e.g. WP Mail SMTP) |
| Style broken | Theme activate ho aur `assets/styles.css` maujood ho |

---

## Contact details (theme mein set)

- WhatsApp: +923265035398
- Email: ubaidullah8042003@gmail.com
- Location: Punjab, Pakistan

Yeh `wp-theme/hassancomputer/functions.php` mein change kar sakte hain.

---

**Done!** Aap ki website ab WordPress par live ho sakti hai.
