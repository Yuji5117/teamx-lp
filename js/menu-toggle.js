$(function () {
  $(".l-header__menu-toggle").on("click", function () {
    $(".l-header__nav").toggleClass("menu-lists-active");
    $(".l-header__menu-toggle").toggleClass("active");
  });

  $(".l-header__item").on("click", function () {
    $(".l-header__nav").removeClass("menu-lists-active");
    $(".l-header__menu-toggle").removeClass("active");
  });
});
