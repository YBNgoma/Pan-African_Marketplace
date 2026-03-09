# 🌍 Pan-African B2B/B2C Marketplace & Escrow Engine

**Target Market:** 54 African Countries (SADC, ECOWAS, EAC, Maghreb) 

---

## 📖 Project Overview

This platform is a data-efficient, mobile-first solution designed to unify fragmented African markets. By leveraging a native **Stripe-based Escrow system**, it bridges the trust gap between continental vendors and buyers, using **USD** as the base currency for stability.

### 🛠️ The Tech Stack

* 
**Framework:** Laravel 11 (PHP 8.3) 

* 
**Scaffolding:** **Laravel Jetstream** (Teams enabled for Vendor Shops) 


* **Frontend:** **TALL Stack** (Tailwind CSS, Alpine.js, Laravel, Livewire)
* **Database:** **PostgreSQL** (Managed via Supabase or Laravel Cloud)
* **Storage:** **Cloudflare R2** (S3-compatible, zero egress fees for product media)
* 
**Payments:** **Stripe API** (Manual Capture logic for Escrow) 


* 
**Deployment:** **PWA** (Progressive Web App) optimized for 3G/4G networks 



---

## 🚀 Key Features

### 🔐 The "Trust Engine" (Escrow System)

* 
**Authorize & Hold:** Payments are authorized via Stripe but held in `requires_capture` status.


* 
**Virtual Wallet:** A database-backed ledger tracking `Pending` vs. `Available` balances.


* 
**The Verification Loop:** Funds move to "Available" only after the buyer confirms "Goods Received".


* 
**Dispute Resolution:** Admin panel for manual intervention if trade terms are not met.



### 📦 B2B Retailer Engine

* 
**Bulk Pricing Tiers:** Dynamic pricing logic that applies wholesale discounts automatically.


* 
**Regional Dashboards:** localized trending products and shipping estimates.


* 
**WhatsApp Trade:** Integrated "Negotiate on WhatsApp" button to maintain high-touch commerce.



### 🌍 Pan-African Localization

* 
**Language Hub:** Dynamic UI switching between **English, French, Arabic, and Portuguese**.


* 
**Hybrid Payouts:** Manual payout dashboard for sellers to receive funds via **Mukuru, WorldRemit, or Wire**.


* 
**Data Optimization:** Extreme compression (WebP/Lazy Loading) for low-bandwidth territories.



---

## 📂 Core Database Schema (High-Level)

| Table | Key Responsibility |
| --- | --- |
| **Teams** | Acts as the "Vendor Shop" for B2B manufacturers/retailers.

 |
| **Wallets** | Manages `pending_balance` (escrow) and `available_balance` (cleared).

 |
| **Orders** | Tracks Stripe `payment_intent_id` and delivery verification status.

 |
| **Products** | Stores wholesale quantity tiers and regional visibility.

 |

---
* 
**Transaction Security:** PCI-compliant payment handling via Stripe API.