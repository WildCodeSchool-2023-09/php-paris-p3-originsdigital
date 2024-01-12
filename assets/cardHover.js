const indexCards = document.getElementsByClassName('index-card');

Array.from(indexCards).forEach(indexCard => {
    const rectoIndexCard = indexCard.querySelector(".recto-index-card");
    const versoIndexCard = indexCard.querySelector(".verso-index-card");

    indexCard.addEventListener("mouseover", () => {
        rectoIndexCard.style.display = "none";
        versoIndexCard.style.display = "block";
    });

    indexCard.addEventListener("mouseout", () => {
        rectoIndexCard.style.display = "block";
        versoIndexCard.style.display = "none";
    });
});
