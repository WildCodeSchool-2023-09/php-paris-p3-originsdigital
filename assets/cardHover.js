const cards = document.querySelectorAll("card");

cards.forEach(card => {
    card.addEventListener("mouseover", () => {
        var cardDescription = card.querySelector("p");
        var cardLogo = card.querySelector("img");
        var cardButton = card.querySelector("a");
        var cardTitle = card.querySelector("h2");

        cardTitle.style.marginTop = "15%";
        cardDescription.style.display = "block";
        cardDescription.style.marginTop = "15%";
        cardLogo.style.display = "none";
        cardButton.style.display = "inline-block";
        cardButton.style.marginTop = "15%";
    });

    card.addEventListener("mouseout", () => {
        var cardDescription = card.querySelector("p");
        var cardLogo = card.querySelector("img");
        var cardButton = card.querySelector("a");
        var cardTitle = card.querySelector("h2");

        cardTitle.style.marginTop = "0%";
        cardDescription.style.display = "none";
        cardLogo.style.display = "inline";
        cardButton.style.display = "none";
    });
});