<template>
<div id="footer">

    <div id="firstWrapper">

        <div class="footer-section">
            <img :src="'/Laurelin/images/logo.png'" alt="Logo Laurelin" class="logo" />
        </div>

        <div class="footer-section" v-for="(sections, sectionTitle) in content" :key="sectionTitle">
            <p class="section-title font-title-24">{{ sectionTitle }}</p>
            <ul class="first-rank">
                <li v-for="(links, subsectionTitle) in sections" :key="subsectionTitle" class="subsection">
                    <p class="subsection-title font-subtitle-16">{{ subsectionTitle }}</p>
                    <ul>
                        <li v-for="(link, label) in links" :key="label">
                            <a :href="link" class="font-body-m">{{ label }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="footer-section">
            <p class="section-title font-title-24">Canaux Principaux</p>
            <div class="social-links">
                <a href="https://www.instagram.com/laurelin.jewels/">
                    <img :src="'/Laurelin/images/instagram.svg'" alt="Instagram" class="icon" />
                </a>
                <a href="https://x.com/LaurelinJewels">
                    <img :src="'/Laurelin/images/x.svg'" alt="X" class="icon" />
                </a>
                <a href="https://fr.pinterest.com/search/pins/?q=Luxury%20Jewels&rs=typed">
                    <img :src="'/Laurelin/images/pinterest.svg'" alt="Pinterest" class="icon" />
                </a>
            </div>
        </div>
    </div>

    <div id="secondWrapper">
        <a href="#">Notre association</a>
    </div>

</div>

</template>

<script setup>
const content = {
    Laurelin: {
        "Nos Produits": {
            Bagues: "/Laurelin/categories/Bagues",
            Bracelets: "/Laurelin/categories/Bracelets",
            Colliers: "/Laurelin/categories/Colliers",
            "Boucles d'oreilles": "/Laurelin/categories/Boucles%20d%27oreilles",
        },
        "À propos de nous": {
            Créateur: "/Laurelin/histoire",
            Créations: "/Laurelin/histoire",
            Durabilité: "/Laurelin/histoire",
        },
        Contact: {
            "Nous contacter": "/Laurelin/contact",
            "Questions fréquentes": "/Laurelin/contact",
        },
    },
    "Légal": {
        "Mentions Légales": {
            "Conditions d’utilisation": "/Laurelin/contact",
            "Conditions de vente": "/Laurelin/contact",
            "Politique de confidentialité": "/Laurelin/contact",
            "Politique de cookies": "/Laurelin/contact",
        },
        Support: {
            Accessibilité: "/Laurelin/contact",
            "Effectuer un signalement": "/Laurelin/contact",
        },
    },
};
</script>

<style scoped>
    a {
        text-decoration: none;
        color: #000000;
    }
    a:hover {
        text-decoration: underline;
    }
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* General Wrapper */
    #firstWrapper {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 2rem 3rem;
        background-color: #f9f9f9;
    }

    #secondWrapper {
        height: 400px;
        background-image: url('/Laurelin/images/paysage.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    #secondWrapper a {
        color: white;
        font-size: 48px;
        text-decoration: none;
        font-family: "Tenor Sans", serif;
        line-height: 40px;
        letter-spacing: 4px;
        text-transform: uppercase;
        cursor: pointer;
        transition-duration: 0.5s;
    }
    #secondWrapper a:hover {
        scale: 1.05;
    }
    /* Sections */
    .section-title {
        color: var(--main);
    }

    .subsection-title {
        margin-bottom: 8px;
    }

    .footer-section {
        flex: 1;
        padding: 1rem;
    }

    .subsection {
        margin-top: 32px;
    }

    .logo {
        width: 40%;
        min-width: 150px;
        height: auto;
        margin-left: 15%;
    }

    .first-rank {
        margin: 32px 0;
    }

    .social-links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 32px;
        margin: 32px 0;
        max-width: 300px;
    }

    .icon {
        width: 24px;
        height: 24px;
        transition-duration: 0.25s;
    }
    .icon:hover {
        transform: scale(1.2);
    }

    /* Media queries */
    @media (max-width: 768px) {
        #firstWrapper {
            flex-direction: column;
        }

        #secondWrapper a {
            font-size: 30px;
        }
    }
</style>
