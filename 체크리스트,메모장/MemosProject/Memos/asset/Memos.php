<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="common/default.css">
  <link rel="stylesheet" href="css/Momos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Pangolin|Shadows+Into+Light|Skranji" rel="stylesheet">

</head>

<body>
  <div class="wrap">
    <div class="container">
      <header>
        <h1>CHECK LIST</h1>
        <span id="arrow" class="arrowClass"><a href="html/memosTitle.html"><img src="src/img/arrowRight.png" alt=""></a></span>
      </header>
      <section>
        <div id="themesBox" class="ThemesCont">
          <div class="originThemes colorBox" id="originThemes">

          </div>
          <div class="color1 colorBox" id="themes1">

          </div>
          <div class="color2 colorBox" id="themes2">

          </div>
        </div>
        <form action="../MEMO/interval.php" name="listForm" method="post">
          <div id="add" class="inputCont">
            <!--            <input type="text" class="contInput" name="contInput">-->
            <input type="text" name="listContent" id="inputlist" class="listBar" autocomplete="off" placeholder="내용을 입력해 주세요">
            <button type="submit" id="addButton" class="button"><img src="http://g90179.com/data/file/GICOM/2041429302_8V6AMe2y_26aae4ad63ee2c0fd43e23851d9a8e460f9c2c9b.png" alt=""></button>
          </div>
          <div class="listCont" id="listParent">
            <ul id="list">
              <li class="liStyle">체크리스트를 만들어보세요^-^
                <span class="xbox">x</span>
              </li>
            </ul>
          </div>
        </form>
      </section>
      <footer>
        <div id="copyright" class="footer__cont">
          copyright @EunYeong JunYeong
          <span class="setting" id="settingIcon"><img src="src/img/setting.png" alt=""></span>
        </div>
      </footer>
      <nav id="settingNav" class="sttNav">
        <div class="navTitle">
          CheckList Setting
        </div>
        <span class="stClose" id="settingClose">
                        <img src="src/img/stClose.png" alt="">
                    </span>

        <ul class="stUl" id="settingUl">
          <li class="stParentUl">
            <p class="stTile">스킨</p>
            <p class="stSub">메모장의 스킨을 설정합니다.</p>
            <img src="src/img/stArrow.png" alt="" class="stArrow">
            <ul class="stSubUl">
              <li>
                select1
              </li>
              <li>
                select1
              </li>
              <li>
                select1
              </li>
            </ul>
          </li>
          <li class="stParentUl">
            <p class="stTile">날짜/시간/언어 표시</p>
            <p class="stSub">날짜/시간 표시 설정</p>
            <img src="src/img/stArrow.png" alt="" class="stArrow">
            <ul class="stSubUl">
              <li>
                KOREA
              </li>
              <li>
                USA
              </li>
              <li id="otherDate">
                OTHER
              </li>
            </ul>
          </li>
          <li class="stParentUl">
            <p class="stTile">자동 저장 설정</p>
            <p class="stSub">저장하지 안혹 빠져나올 때 자동저장 여부 선택</p>
            <img src="src/img/stArrow.png" alt="" class="stArrow">
            <ul class="stSubUl">
              <li>
                Auto
              </li>
              <li>
                Directly
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {



      /* ajax 통신 */
      function listEnter() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../MEMO/interval.php', true);
        xhr.onreadystatechange = function() {
          if (this.status == 200 && this.readyState == 4) {
            console.log('성공');
          }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-urlencoded')
        xhr.send();
      }

      function listClick() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../MEMO/interval.php', true);
        xhr.onreadystatechange = function() {
          if (this.status == 200 && this.readyState == 4) {
            console.log('성공');

          }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-urlencoded')
        xhr.send();
      }
      /* ajax 통신*/


      let listBar = document.getElementById('inputlist');
      let addButton = document.getElementById('addButton');
      let checkList = document.getElementById('list');
      let listCont = document.getElementsByClassName('listCont');
      let listAll = document.getElementsByClassName('liStyle');


      addButton.addEventListener('click', function() {

        if (listBar.value.length == 0) {
          alert('검색어를 입력해주세요');
        } else {
          let searchValue = document.getElementById('inputlist').value;
          let listLi = document.createElement('li');
          listLi.classList.add('liStyle');
          listLi.append(searchValue);
          checkList.prepend(listLi);


          let xbox = document.createElement('span');
          xbox.classList.add('xbox');
          xbox.innerHTML = 'x';
          listLi.append(xbox);

          /* ajax 통신 */
          listClick();
//          listBar.value = '';
        }
      })


      /* 
          default Ui CheckList view 
      */

      for (let defaultCount = 0; defaultCount < 10; defaultCount++) {
        let defaultDiv = document.createElement('li');
        defaultDiv.classList.add('deleteDeco')
        checkList.append(defaultDiv)
      }

      /* 
          default Ui CheckList view 
      */

      listBar.addEventListener('keydown', function(e) {
        if (e.keyCode == 13) {
          if (listBar.value.length == 0) {
            alert('검색어를 입력해주세요')
          } else {
            let searchValue = document.getElementById('inputlist').value;
            let listLi = document.createElement('li');
            listLi.classList.add('liStyle');
            listLi.append(searchValue);
            checkList.prepend(listLi);


            let xbox = document.createElement('span');
            xbox.classList.add('xbox');
            xbox.innerHTML = 'x';
            listLi.append(xbox);


            /* ajax 통신 */
            listEnter();
//          listBar.value = '';
          }

          if (checkList.childElementCount == 20) {
            console.log('10');
            checkList.classList.add('listCountTen');
          }
        }
      })


      let listParent = document.getElementById('listParent');
      let xboxClick = document.getElementsByClassName('xbox');


      listParent.addEventListener('click', function(e) {
        if (e.target.className == 'liStyle') {
          e.target.classList.add('addCheck')
          let checkIcon = document.createElement('span');
          checkIcon.classList.add('checkIcon')
          e.target.append(checkIcon);

          e.target.firstElementChild.classList.add('showXbox')

        } else if (e.target.classList.contains('addCheck')) {
          console.log('out');
          e.target.classList.remove('addCheck');
          e.target.lastElementChild.remove()
          e.target.firstElementChild.classList.remove('showXbox')
        }

        if (e.target.className == 'xbox') {
          console.log('in')
          console.log(e.target);
          e.target.parentElement.remove()
        } else if (e.target.classList.contains('xbox', 'showXbox')) {
          e.target.parentElement.remove()
        }
      })


      /* themes*/

      let themes1 = document.getElementById('themes1');
      let themes2 = document.getElementById('themes2');
      let originThemes = document.getElementById('originThemes');
      let h1 = document.getElementsByTagName('h1')[0];
      let themesBox = document.getElementById('themesBox');

      themesBox.addEventListener('click', function(e) {
        if (h1.classList.length == 1) {
          h1.removeAttribute('class')
        }
        if (h1.classList.length == 0) {
          h1.classList.add(e.target.id)
        }

      })

      /* themes*/

      /* settingNav*/
      let settingIcon = document.getElementById('settingIcon');
      let settingNav = document.getElementById('settingNav');

      settingIcon.addEventListener('click', function() {
        settingNav.classList.add('sttNavShow')
      });

      let settingClose = document.getElementById('settingClose');

      settingClose.addEventListener('click', function() {
        settingNav.classList.remove('sttNavShow')
      })



      let settingUl = document.getElementById('settingUl');

      let stParentUl = document.querySelectorAll('stParentUl');

      let settingSubUl = document.querySelectorAll('stSubUl');
      let settingArrow = document.querySelectorAll('stArrow');

      settingUl.addEventListener('click', function(e) {
        console.log(e.target)
        if (e.target.classList.contains('stArrow')) {
          e.target.classList.toggle('stArrowToggle');
          if (e.target.nextElementSibling.classList.contains('stShow')) {
            e.target.nextElementSibling.classList.remove('stShow');
          } else {
            e.target.nextElementSibling.classList.toggle('stShow');
          }
        }
      })

      let otherDate = document.getElementById('otherDate');
      otherDate.addEventListener('click', function() {
        window.open('pop/POP-date.html', '', 'top=20,left=20,width=300px,height=150px')
      })









    })

  </script>
</body>

</html>
