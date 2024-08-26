<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Drop Down Sidebar Menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="statics/css/customer.css">
        <!--loding.css-->
        <!--<link href="statics/css/loding.css" rel="stylesheet">-->
        <!--Boxicons CDN Links -->
        <link href='https://unpkg.com/boxicons@2.1.3/css/boxicons.min.css' rel='stylesheet'>        
    </head>
    <body>

      <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-cat'></i>
            <span class="logo_name">Vastar_ERP</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">系統資料</a></li>
                    <li><a class="link_name" href="#">基本資料</a></li>
                    <li><a class="link_name" href="#">庫存管理</a></li>
                    <li><a class="link_name" href="#">各類單據</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">系統設定</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">系統設定</a></li>
                    <li><a href="#">權限設定</a></li>
                    <li><a href="#">系統設定</a></li>
                    <li><a href="#">類別設定</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">基本資料</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">基本資料</a></li>
                    <li><a href="#">部門主檔</a></li>
                    <li><a href="staff.php">員工主檔</a></li>
                    <li><a href="customer.php">客戶主檔</a></li>
                    <li><a href="#">產品主檔</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-cabinet'></i>
                        <span class="link_name">庫存管理</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>

            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bxs-spreadsheet'></i>
                        <span class="link_name">各類單據</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">各類單據</a></li>
                    <li><a href="Sidebar.php">銷貨退(憑)單</a></li>
                    <li><a href="pre_order_voucher_ver2.php">預購單</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="statics/img/vastar_logo.png" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name">
                            <?php
                            if (isset($_COOKIE["cuser_name"])) {
                                echo $_COOKIE["cuser_name"];
                            } else {
                                echo "None";
                            }
                            ?>
                        </div>
                        <div class="job">員工相關資訊</div>
                    </div>
                    <i class='bx bx-log-out'></i>
                </div>
            </li>

        </ul>
    </div>
        
        <section class="home-section">
          <!--home-content算做 part1 -->
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <img class="vastar-logo" src="statics/img/vastar_logo.png" alt="vastar_logo">
                <span class="title">廣南國際有限公司</span>
                <span class="title_en">Vastar International Corporation</span>
                <!--<span class="document-title">銷貨(退憑)單</span>-->
                
                <!--選擇選單-->
                <div class="select">
                  <select  name="type_select" onChange="location = this.options[this.selectedIndex].value;">
                    <option value="Sidebar.php">客戶主檔</option>
                    <option value="staff.php">員工主檔</option>   
                  </select>
                </div>
            </div>

<!--part2 -->
            <form action="#">
              <div class="customer-details">
                <div class="input-box">
                  <span class="details">客戶代號</span>
                  <input type="text" required>
                </div> 
                <div class="input-box">
                  <span class="details">客戶姓名</span>
                  <input type="text" required>
                </div>  
                <div class="input-box">
                  <span class="details"></span>
                  <input type="text" required>
                </div>
                <div class="input-box">
                  <span class="details">電話</span>
                  <input type="text"  required>
                </div>
                <div class="input-box">
                  <span class="details">手機1</span>
                  <input type="tel"  required>
                </div>
                <div class="input-box">
                  <span class="details">手機2</span>
                      <input type="tel"   required>
                </div>
                <div class="input-box">
                  <span class="details">郵遞區號</span>
                  <input type="text"  required>
                </div>  
                <div class="input-box">
                  <span class="details">縣市</span>
                  <input type="tel"  required>
                </div>
                <div class="input-box">
                  <span class="details">鄉鎮市區</span>
                  <input type="tel"   required>
                </div>
                <div class="input-box part-100per">
                  <span class="details">地址</span>
                  <input type="tel"   required>
                </div>
              </div>
            </form>
<!--part3 -->  
              <!--中間的銷貨單內容表格列數先設定只有一個-->
      <div class="table-outbox">
      <table>
        <thead>
          <tr>
            <th width="40"></th>
            <th width="40"></th>
            <th width="150">收件人編號</th>               
            <th width="150">收件人名稱</th>
            <th width="150">收件人標籤</th>
            <th width="150">收件人電話</th>
            <th width="150">收件人手機</th>
            <th width="150">郵遞區號</th>               
            <th width="550">地址</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><input type="checkbox"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
        </tr>
  
        <tr>
          <td>2</td>
          <td><input type="checkbox"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
        </tr>
  
        <tr>
          <td>3</td>
          <td><input type="checkbox"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
        </tr>
        
        <tr>
          <td>4</td>
          <td><input type="checkbox"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
        </tr>

        <tr>
          <td>5</td>
          <td><input type="checkbox"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
        </tr>
      </tbody>
    </table>
  </div>



        <script>
            
            // 讓下拉可以呈現sub-menu的功能
            let arrow = document.querySelectorAll(".arrow");/*選取所有class name有 arrow的選擇器
            然後建立一個串列，基本上就是所有有下拉icon的*/
            for(var i=0; i < arrow.length; i++){
                arrow[i].addEventListener("click", (e)=>{
                let arrowParent = e.target.parentElement.parentElement;
        
                arrowParent.classList.toggle("showMenu");
                });
            }

            // 讓sidebar縮小至左邊的功能
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".bx-menu");
            console.log(sidebarBtn);
            sidebarBtn.addEventListener("click",()=>{
                sidebar.classList.toggle("close");
            });

            // 左下角登出icon加入登出功能
            let logoutBtn = document.querySelector(".bx-log-out");
            console.log(logoutBtn);
            logoutBtn.addEventListener('click',()=>{
                console.log(document.cookie); // 會得到一串cookie值是以分號串接的cookie
                var cuser_name = getCookie("cuser_name");
                alert(cuser_name + "\n確定要登出嗎?");
                window.location = "login.html"; // 登出跳轉回登入頁面
            });
            
            //用來讀取想要的cookie值
            function getCookie(name){
              const value = `; ${document.cookie}`;
              const parts = value.split(`; ${name}=`);
              if (parts.length === 2) return decodeURI(parts.pop().split(';').shift()); 
              //因為獲得的php setcookie()得到的cookie值, 會進行urlencode,
              // 所以return時要記的進行decode
            }

            //刪除cookie值
            function clearCookie(name) {  
              setCookie(name, "", -1);  
            }  

            // 給中間的銷貨單表格增加或減少產品


        </script>
      </div>
    </body>
</html>