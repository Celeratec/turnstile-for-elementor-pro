# Turnstile for Elementor Pro by Celeratec

[![WordPress Plugin Version](https://img.shields.io/github/v/release/Celeratec/turnstile-for-elementor-pro?label=version&style=flat-square)](https://github.com/Celeratec/turnstile-for-elementor-pro/releases)
[![License](https://img.shields.io/badge/license-GPL%20v2%2B-blue?style=flat-square)](LICENSE)
[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue?style=flat-square&logo=wordpress)](https://wordpress.org/)
[![Elementor Pro](https://img.shields.io/badge/Elementor%20Pro-2.0%2B-orange?style=flat-square)](https://elementor.com/pro/)

> **Professional CAPTCHA integration for Elementor Pro forms** - Add hCaptcha and Cloudflare Turnstile protection with seamless, native-like integration. Maintained by [Celeratec VPS Hosting](https://Hosting.Celeratec.cloud).

---

## Quick Start

### [Download Latest Release](https://github.com/Celeratec/turnstile-for-elementor-pro/releases/latest/download/turnstile-for-elementor-pro.zip)

1. **Download** the plugin ZIP from the link above
2. **Upload** to WordPress via `Plugins > Add New > Upload Plugin`
3. **Activate** the plugin
4. **Configure** your CAPTCHA keys in `Elementor > Settings > Integrations`
5. **Add** CAPTCHA fields to your forms just like reCAPTCHA!

---

## Features

### CAPTCHA Providers

- **hCaptcha** - Privacy-focused CAPTCHA solution
- **Cloudflare Turnstile** - Invisible CAPTCHA with zero friction

### Integration

- **Native Feel** - Works exactly like Elementor's built-in reCAPTCHA
- **Pro Elements Compatible** - Works with both Elementor Pro and Pro Elements
- **No Code Required** - Simple drag-and-drop field integration
- **Settings Integration** - Configuration in familiar Elementor settings

### Developer Features

- **Modern Architecture** - Clean, object-oriented code
- **Extensible Design** - Abstract base class for adding new CAPTCHA providers
- **Performance Optimized** - External JS files for better caching
- **WordPress Standards** - Follows all WordPress coding conventions

---

## Supported CAPTCHA Solutions

<table>
<tr>
<td align="center" width="50%">

### hCaptcha

**GDPR Compliant** | **Privacy-First** | **Enterprise Ready**

[Get hCaptcha Keys](https://www.hcaptcha.com/)

</td>
<td align="center" width="50%">

### Cloudflare Turnstile

**Invisible to Users** | **No Puzzles** | **Cloudflare Powered**

[Get Turnstile Keys](https://developers.cloudflare.com/turnstile/)

</td>
</tr>
</table>

---

## Requirements

| Requirement                           | Version | Status |
| ------------------------------------- | ------- | ------ |
| **WordPress**                         | 5.0+    | OK     |
| **PHP**                               | 7.4+    | OK     |
| **Elementor Pro** or **Pro Elements** | 2.0+    | OK     |

> **Note:** Works with both the full Elementor Pro and the free Pro Elements versions!

---

## Installation & Setup

### Method 1: Direct Download (Recommended)

```bash
# Download the latest release
wget https://github.com/Celeratec/turnstile-for-elementor-pro/releases/latest/download/turnstile-for-elementor-pro.zip

# Upload via WordPress Admin > Plugins > Add New > Upload Plugin
```

### Method 2: Manual Installation

1. Clone this repository
2. Run `npm install && npm run build` to create the plugin ZIP
3. Upload the generated ZIP file to WordPress

---

## Configuration Guide

### 1. hCaptcha Setup

1. Visit [hCaptcha.com](https://www.hcaptcha.com/) and create an account
2. Add your site and get your **Site Key** and **Secret Key**
3. Go to **WordPress Admin > Elementor > Settings > Integrations > hCaptcha**
4. Enter your keys and save

### 2. Cloudflare Turnstile Setup

1. Visit [Cloudflare Dashboard](https://dash.cloudflare.com/) and navigate to Turnstile
2. Create a new site and get your **Site Key** and **Secret Key**
3. Go to **WordPress Admin > Elementor > Settings > Integrations > Cloudflare Turnstile**
4. Enter your keys and save

### 3. Adding to Forms

1. Edit your Elementor page/template
2. Add or edit a Form widget
3. Add a new field and select **hCaptcha** or **Cloudflare Turnstile**
4. Position it where you want in your form
5. Save and test!

---

## Contributing

We welcome contributions! Here's how to get started:

### Development Setup

```bash
# Clone the repository
git clone https://github.com/Celeratec/turnstile-for-elementor-pro.git
cd turnstile-for-elementor-pro

# Install dependencies
npm install

# Start development
npm run dev
```

### Available Commands

- `npm run dev` - Lint and build for development
- `npm run build` - Create production ZIP
- `npm run release` - Full release process
- `npm run lint` - Check code quality
- `npm run format` - Format code with Prettier

---

## Support & Documentation

### Documentation

- [Installation Guide](#installation--setup)
- [Configuration Guide](#configuration-guide)
- [Development Guide](DEVELOPMENT.md)

### Issues & Bugs

Found a bug? Please [open an issue](https://github.com/Celeratec/turnstile-for-elementor-pro/issues/new) with:

- WordPress version
- Elementor Pro/Pro Elements version
- Plugin version
- Steps to reproduce

### Questions

- Check existing [Issues](https://github.com/Celeratec/turnstile-for-elementor-pro/issues)
- Ask in [Discussions](https://github.com/Celeratec/turnstile-for-elementor-pro/discussions)

---

## License

This plugin is licensed under the **GPL v2 or later**.

```
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

---

## Credits

This plugin is a fork of [Captcha for Elementor Pro Forms](https://github.com/DavePodosyan/captcha-for-elementor-pro-forms) originally created by **[Dave Podosyan](https://github.com/DavePodosyan)** and released under the GPL v2 or later license.

### Maintained By

- **[Celeratec, LLC](https://Hosting.Celeratec.cloud)** - Celeratec VPS Hosting

### Powered By

- **[Elementor](https://elementor.com/)** - The leading WordPress page builder
- **[hCaptcha](https://www.hcaptcha.com/)** - Privacy-focused CAPTCHA solution
- **[Cloudflare Turnstile](https://www.cloudflare.com/products/turnstile/)** - Invisible CAPTCHA alternative

---

<div align="center">

[![Download Latest](https://img.shields.io/badge/Download%20Latest%20Release-success?style=for-the-badge)](https://github.com/Celeratec/turnstile-for-elementor-pro/releases/latest)

</div>
