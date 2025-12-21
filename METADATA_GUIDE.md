# Metadata & Page Titles Guide

This document explains how to manage page titles and metadata (icons, descriptions, social media tags) in your Laravel application.

## Features Implemented

### 1. **Page Titles in Browser Tab**
Each page now has a properly formatted title that appears in the browser tab:
- Format: `Application Name - Page Title`
- Dynamic based on the current page

### 2. **Meta Tags Included**

#### Basic Meta Tags
- `charset`: UTF-8 encoding
- `viewport`: Responsive design support
- `description`: Page description for search engines
- `keywords`: SEO keywords

#### Open Graph Tags (Social Media)
- `og:title`: Title for social sharing
- `og:description`: Description for social sharing
- `og:image`: Image preview for social sharing
- `og:type`: Content type
- `og:url`: Current page URL

#### Twitter Card Tags
- `twitter:card`: Card type
- `twitter:title`: Twitter-specific title
- `twitter:description`: Twitter description
- `twitter:image`: Twitter preview image

#### Mobile & Theme
- `theme-color`: Browser address bar color
- `apple-mobile-web-app-capable`: Enable web app mode on iOS
- `apple-mobile-web-app-status-bar-style`: iOS status bar style

### 3. **Favicon & Icons**
The following icons are configured:
- `favicon.svg`: Main favicon (SVG format)
- `favicon.png`: Fallback favicon (PNG format)
- `apple-touch-icon.png`: iOS home screen icon

Files are located in `public/images/` folder.

---

## How to Use

### Setting Page Titles

In any Blade template extending `layouts.app`, use the `title` section:

```blade
@extends('layouts.app')

@section('title', 'Your Page Title')
```

The title will automatically be formatted as: `Laravel - Your Page Title`

### Setting Meta Descriptions

Add a meta description to improve SEO:

```blade
@extends('layouts.app')

@section('title', 'Dashboard')
@section('meta_description', 'View your dashboard with analytics and quick actions')
@section('meta_keywords', 'dashboard, analytics, stats')
```

### Setting Social Media Preview

Customize how your page appears when shared on social media:

```blade
@section('title', 'My Article')
@section('meta_description', 'Read this amazing article')
@section('meta_image', asset('images/article-preview.jpg'))
```

---

## File Locations

| File | Location | Purpose |
|------|----------|---------|
| Layout Template | `resources/views/layouts/app.blade.php` | Main layout with all meta tags |
| Welcome Page | `resources/views/welcome.blade.php` | Landing page |
| Dashboard | `resources/views/dashboard/index.blade.php` | Dashboard page |
| Login Page | `resources/views/login.blade.php` | Authentication page |
| Favicon SVG | `public/images/favicon.svg` | SVG format icon |
| Favicon PNG | `public/images/favicon.png` | PNG format icon |
| Apple Icon | `public/images/apple-touch-icon.png` | iOS home screen icon |

---

## Customization Guide

### Change Application Name
Edit `config/app.php`:
```php
'name' => env('APP_NAME', 'Your App Name'),
```

### Update Favicon

1. **SVG Favicon** (Recommended - scalable)
   - Replace `public/images/favicon.svg` with your SVG

2. **PNG Favicon** (Fallback)
   - Replace `public/images/favicon.png` (recommended: 32x32 or 64x64 pixels)

3. **Apple Touch Icon** (iOS)
   - Replace `public/images/apple-touch-icon.png` (recommended: 180x180 pixels)

### Update Theme Color
In `resources/views/layouts/app.blade.php`, change:
```html
<meta name="theme-color" content="#1e3a8a">
```

### Update Default OG Image
Create a default social media image and reference it in `app.blade.php`:
```html
<meta property="og:image" content="{{ asset('images/og-image.png') }}">
```

---

## Best Practices

1. **Keep titles concise**: Aim for 50-60 characters
2. **Write descriptive meta descriptions**: 150-160 characters work best for SEO
3. **Use relevant keywords**: 3-5 keywords per page
4. **Provide social preview images**: 1200x630px recommended for og:image
5. **Update favicon regularly**: It appears in browser tabs and bookmarks
6. **Test on different devices**: Verify icons on mobile and desktop

---

## Browser Tab Preview

When implemented correctly, your pages will show:
- **Tab Title**: "App Name - Page Title"
- **Favicon**: Small icon in the browser tab
- **Apple Icon**: On iOS devices when added to home screen

## Social Media Preview

When someone shares your link:
- **Title**: From `og:title` or page `<title>`
- **Description**: From `og:description`
- **Image**: From `og:image`
- **URL**: Automatically included

---

## Testing Meta Tags

Use these online tools to verify your meta tags:

1. **Facebook Debugger**: https://developers.facebook.com/tools/debug/og/object/
2. **Twitter Card Validator**: https://cards-dev.twitter.com/validator
3. **Google Rich Results Test**: https://search.google.com/test/rich-results
4. **Lighthouse (Chrome DevTools)**: Built-in performance & SEO audit

---

## Next Steps

1. Add your own favicon images to `public/images/`
2. Update meta descriptions for each key page
3. Add social media preview images
4. Test using the tools mentioned above
5. Monitor SEO performance in Google Search Console
