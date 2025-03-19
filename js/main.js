
const windowInnerWidth = document.documentElement.clientWidth;
const scrollbarWidth = parseInt(window.innerWidth) - parseInt(document.documentElement.clientWidth);

const bodyElementHTML = document.getElementsByTagName("body")[0];
const modalBackground = document.getElementsByClassName("modalBackground")[0];
const modalClose = document.getElementsByClassName("modalClose")[0];
const modalActive = document.getElementsByClassName("modalActive")[0];

// document.getElementById("html").addEventListener(
//     "mouseleave",
//     function (event) {
//         alert("Не уходи, постой...")
//     }
// );
// функция для корректировки положения body при появлении ползунка прокрутки
function bodyMargin() {
    bodyElementHTML.style.marginRight = "-" + scrollbarWidth + "px";
}

// при длинной странице - корректируем сразу
bodyMargin();
// событие нажатия на триггер открытия модального окна
document.getElementById("html").addEventListener(
    "mouseleave", function () {
        //console.log(event.pageX + ' : ' + event.pageY)
        if(event.pageY < 0){
            
        // делаем модальное окно видимым
        modalBackground.style.display = "block";

        // если размер экрана больше 1366 пикселей (т.е. на мониторе может появиться ползунок)
        if (windowInnerWidth >= 1366) {
            bodyMargin();
        }

        // позиционируем наше окно по середине, где 175 - половина ширины модального окна
        modalActive.style.left = "calc(20%)";
    }
});
// нажатие на крестик закрытия модального окна
modalClose.addEventListener("click", function () {
    modalBackground.style.display = "none";
    if (windowInnerWidth >= 1366) {
        bodyMargin();
    }
});

// закрытие модального окна на зону вне окна, т.е. на фон
modalBackground.addEventListener("click", function (event) {
    if (event.target === modalBackground) {
        modalBackground.style.display = "none";
        if (windowInnerWidth >= 1366) {
            bodyMargin();
        }
    }
});

let elem = document.getElementById('elem');

document.addEventListener('mousemove', function(event) {
	elem.innerHTML = event.pageX + ' : ' + event.pageY;
});