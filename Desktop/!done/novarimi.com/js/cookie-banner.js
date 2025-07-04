class CookieBanner {
    constructor() {
        this.cookieName = 'cookie_consent';
        this.cookieExpireDays = 365;
        this.banner = null;
        this.init();
    }

    init() {
        if (!this.hasConsent()) {
            this.createBanner();
            this.showBanner();
        }
    }

    createBanner() {
        this.banner = document.createElement('div');
        this.banner.className = 'cookie-banner';
        this.banner.id = 'cookie-banner';
        
        this.banner.innerHTML = `
            <div class="cookie-banner-content">
                <div class="cookie-banner-text">
                    <h4>🍪 Використання файлів cookie</h4>
                    <p>Ми використовуємо файли cookie для покращення вашого досвіду на нашому сайті, аналізу трафіку та персоналізації контенту. Продовжуючи користуватися сайтом, ви погоджуєтесь з нашою <a href="privacy-policy.html" target="_blank">Політикою конфіденційності</a>.</p>
                </div>
               <div class="cookie-banner-buttons">
                    <button class="cookie-btn cookie-btn-accept" onclick="cookieBanner.acceptCookies()">
                        Прийняти всі
                    </button>
                    <button class="cookie-btn cookie-btn-decline" onclick="cookieBanner.declineCookies()">
                        Відхилити
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(this.banner);
    }

    showBanner() {
        if (this.banner) {
            setTimeout(() => {
                this.banner.classList.add('show');
            }, 500);
        }
    }

    hideBanner() {
        if (this.banner) {
            this.banner.classList.remove('show');
            // Remove from DOM after animation
            setTimeout(() => {
                if (this.banner && this.banner.parentNode) {
                    this.banner.parentNode.removeChild(this.banner);
                }
            }, 300);
        }
    }

    acceptCookies() {
        this.setCookie(this.cookieName, 'accepted', this.cookieExpireDays);
        this.hideBanner();
        
        this.enableTracking();
        
        console.log('Cookies accepted');
    }

    declineCookies() {
        this.setCookie(this.cookieName, 'declined', this.cookieExpireDays);
        this.hideBanner();
        
        this.disableTracking();
        
        console.log('Cookies declined');
    }


    enableTracking() {
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted',
                'ad_storage': 'granted'
            });
        }
        
        localStorage.setItem('tracking_enabled', 'true');
    }

    disableTracking() {
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'denied',
                'ad_storage': 'denied'
            });
        }
        
        localStorage.setItem('tracking_enabled', 'false');
    }

    hasConsent() {
        const consent = this.getCookie(this.cookieName);
        return consent === 'accepted' || consent === 'declined';
    }

    isAccepted() {
        return this.getCookie(this.cookieName) === 'accepted';
    }

    setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
    }

    getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    resetConsent() {
        document.cookie = `${this.cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
        location.reload();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    window.cookieBanner = new CookieBanner();
});

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        if (!window.cookieBanner) {
            window.cookieBanner = new CookieBanner();
        }
    });
} else {
    window.cookieBanner = new CookieBanner();
}