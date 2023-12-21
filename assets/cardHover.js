if (window.innerWidth >= 768) {

    const languageCards = document.getElementsByClassName('language-card');

    Array.from(languageCards).forEach(languageCard => {
        const languageCardDescription = languageCard.querySelector("p");
        const languageCardLogo = languageCard.querySelector("img");
        const languageCardButton = languageCard.querySelector("a");
        const languageCardTitle = languageCard.querySelector("h2");

        languageCard.addEventListener("mouseover", () => {
            languageCardTitle.style.marginTop = "10%";
            languageCardDescription.style.display = "block";
            languageCardDescription.style.marginTop = "10%";
            languageCardLogo.style.display = "none";
            languageCardButton.style.display = "inline-block";
            languageCardButton.style.marginTop = "10%";
        });

        languageCard.addEventListener("mouseout", () => {
            languageCardTitle.style.marginTop = "0%";
            languageCardDescription.style.display = "none";
            languageCardLogo.style.display = "inline";
            languageCardButton.style.display = "none";
        });
    });

    const categoryCards = document.getElementsByClassName('category-card');

    Array.from(categoryCards).forEach(categoryCard => {
        const categoryCardDescription = categoryCard.querySelector("p");
        const categoryCardLogo = categoryCard.querySelector("img");
        const categoryCardButton = categoryCard.querySelector("a");
        const categoryCardTitle = categoryCard.querySelector("h3");

        categoryCard.addEventListener("mouseover", () => {
            categoryCardTitle.style.marginTop = "5%";
            categoryCardDescription.style.display = "block";
            categoryCardDescription.style.marginTop = "5%";
            categoryCardLogo.style.display = "none";
            categoryCardButton.style.display = "inline-block";
            categoryCardButton.style.marginTop = "5%";
        });

        categoryCard.addEventListener("mouseout", () => {
            categoryCardTitle.style.marginTop = "0%";
            categoryCardDescription.style.display = "none";
            categoryCardLogo.style.display = "inline";
            categoryCardButton.style.display = "none";
        });
    });
}