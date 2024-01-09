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

    const videoCards = document.getElementsByClassName('video-card');

    Array.from(videoCards).forEach(videoCard => {
        const videoCardDescription = videoCard.querySelector("p");
        const videoCardThumbnail = videoCard.querySelector("img");
        const videoCardButton = videoCard.querySelector("a");
        const videoCardTitle = videoCard.querySelector("h2");

        videoCard.addEventListener("mouseover", () => {
            videoCardTitle.style.marginTop = "8%";
            videoCardDescription.style.display = "block";
            videoCardDescription.style.marginTop = "8%";
            videoCardThumbnail.style.display = "none";
            videoCardButton.style.display = "inline-block";
            videoCardButton.style.marginTop = "8%";
        });

        videoCard.addEventListener("mouseout", () => {
            videoCardTitle.style.marginTop = "0%";
            videoCardDescription.style.display = "none";
            videoCardThumbnail.style.display = "inline";
            videoCardButton.style.display = "none";
        });
    });
}