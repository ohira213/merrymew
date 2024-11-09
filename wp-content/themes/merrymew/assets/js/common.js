function switchByWidth(){
  if (window.matchMedia('(max-width: 767px)').matches) {
    const swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      centeredSlides: true,
      spaceBetween: 30,
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
    });
    
    // モーダル表示
    const slides = document.querySelectorAll(".swiper-slide");
    const modals = document.querySelectorAll(".modal");
    const closeBtns = document.querySelectorAll(".close-btn");
    
    slides.forEach((slide, index) => {
      slide.addEventListener("click", () => {
          modals[index].style.display = "flex";
          document.body.classList.add('modal-open'); // スクロールを無効にする
      });
    });
    
    closeBtns.forEach(btn => {
      btn.addEventListener("click", () => {
          modals.forEach(modal => modal.style.display = "none");
          document.body.classList.remove('modal-open'); // スクロールを有効にする
      });
    });
    
    window.addEventListener("click", (e) => {
      if (e.target.classList.contains("modal")) {
          e.target.style.display = "none";
          document.body.classList.remove('modal-open'); // スクロールを有効にする
      }
    });
  } else if (window.matchMedia('(min-width:768px)').matches) {
    document.querySelectorAll('.stories_list_item').forEach(item => {
      item.addEventListener('click', () => {
          const modalId = item.getAttribute('data-modal');
          const modal = document.getElementById(modalId);
          modal.style.display = "block";
          document.body.style.overflow = 'hidden'; // スクロールを無効にする
      });
  });
  
  document.querySelectorAll('.close-btn').forEach(btn => {
      btn.addEventListener('click', () => {
          const modal = btn.closest('.modal');
          modal.style.display = "none";
          document.body.style.overflow = ''; // スクロールを有効に戻す
      });
  });
  
  // モーダル外をクリックして閉じる機能
  window.addEventListener('click', (event) => {
      if (event.target.classList.contains('modal')) {
          event.target.style.display = "none";
          document.body.style.overflow = ''; // スクロールを有効に戻す
      }
  });
  }
}

//ロードとリサイズの両方で同じ処理を付与する
window.onload = switchByWidth;
window.onresize = switchByWidth;



// アコーディオン
document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
      header.addEventListener('click', function() {
        this.classList.toggle('active');
        const content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    });
  });


  $(function(){
    $(".cmn-btn-more").on("click", function() {
      $(this).toggleClass("on-click");
      $(".txt-hide").slideToggle(200);
  
      // アイコンの状態を更新
      if ($(this).hasClass("on-click")) {
        $(this).find(".icon::before").css("opacity", "0");
        $(this).find(".icon::after").css("transform", "rotate(90deg)");
      } else {
        $(this).find(".icon::before").css("opacity", "1");
        $(this).find(".icon::after").css("transform", "rotate(0deg)");
      }
    });
  });
  

document.addEventListener("DOMContentLoaded", () => {
  const smoothScrollLinks = document.querySelectorAll('a.smooth-scroll');

  smoothScrollLinks.forEach(link => {
      link.addEventListener('click', function (e) {
          e.preventDefault(); // デフォルトの動作を防ぐ

          const targetId = this.getAttribute('href'); // リンクのhrefからターゲットIDを取得
          const targetElement = document.querySelector(targetId); // ターゲット要素を取得

          if (targetElement) {
              const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset; // ターゲットの位置を計算
              window.scrollTo({
                  top: targetPosition,
                  behavior: 'smooth' // スムーススクロールの指定
              });
          }
      });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.querySelector('.hamburger-menu');
  const mobileNav = document.querySelector('.mobile-nav');
  const overlay = document.querySelector('.mobile-nav-overlay');
  const closeBtn = document.querySelector('.close-btn');
  const pageLinks = document.querySelectorAll('.mobile-nav a'); // ページ内リンクを取得

  // ハンバーガーメニューの開閉
  hamburger.addEventListener('click', function() {
      mobileNav.classList.toggle('open');
      overlay.style.display = mobileNav.classList.contains('open') ? 'block' : 'none';
      document.body.style.overflow = mobileNav.classList.contains('open') ? 'hidden' : '';
  });

  // 閉じるボタンとオーバーレイのクリックイベント
  closeBtn.addEventListener('click', closeMenu);
  overlay.addEventListener('click', closeMenu);

  // 各ページ内リンククリック時にもメニューを閉じる
  pageLinks.forEach(link => {
      link.addEventListener('click', closeMenu);
  });

  function closeMenu() {
      mobileNav.classList.remove('open');
      overlay.style.display = 'none';
      document.body.style.overflow = '';
  }
});


$(function(){
  var scrollStart = $('.side-nav').offset().top; // ページ上部からの距離を取得
  var scrollEnd = $('#stories').offset().top; // ページ上部からの距離を取得
  var distance = 0;

  $(document).scroll(function(){
    distance = $(this).scrollTop(); // スクロールした距離を取得

    // スクロール位置が scrollStart 以上なら class『fixed』を追加し、それ以下なら削除
    if (distance >= scrollStart) {
      $('.side-nav').addClass('fixed');
    } else {
      $('.side-nav').removeClass('fixed');
    }

    // スクロール位置が scrollEnd 以上なら class『none』を追加し、それ以下なら削除
    if (distance >= scrollEnd) {
      $('.side-nav').addClass('none');
    } else {
      $('.side-nav').removeClass('none');
    }
  });      
});






