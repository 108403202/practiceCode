<!DOCTYPE html>
<html lang="en">
    <head>
        <title>員工主檔</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="statics/css/staff.css" rel="stylesheet">
        <!--loding.css-->
        <!--<link href="statics/css/loding.css" rel="stylesheet">-->
        <!--Boxicons CDN Links -->
        <link href='https://unpkg.com/boxicons@2.1.3/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        
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
            <div class="home-content">
                <i class='bx bx-menu'></i>

                <div class="somebtn">
                    <input type="button" value="新增" class="some-btn">
                    <input type="button" value="修改" class="some-btn">
                    <input type="button" value="搜尋" class="some-btn">
                    <input type="button" value="存檔" class="some-btn">
                    <input type="button" value="刪除" class="some-btn">
                    <input type="button" value="列印" class="some-btn">
                    <input type="button" value="離開" class="some-btn">
                    <input type="button" value="push button" class="some-btn push">
                </div>

                <form action="#" method="post">
                    <div class="staff-details">
                        <div class="input-box">
                            <span class="details">員工代號</span>
                            <input type="text" id="staffNum"  placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">員工姓名</span>
                            <input type="text" id="staffName"  placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">英文姓名</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">分機</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">部門代號</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">部門名稱</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">員工大類</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">員工排序</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">員工類別</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">職稱</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">性別</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">到職日</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">離職日</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">試用起始日</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">正式起始日</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">出生日期</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">身分證號</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details"></span>
                            <input type="text" placeholder="">
                        </div>
                    </div>
                    
                    <div class="staff-details part2">
                        <div class="input-box">
                            <span class="details">婚姻狀況</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">血型</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <input class="checkbox" type="checkbox">
                            <span class="checkbox-details">排班顯示</span>  
                        </div>
                        <div class="input-box">
                            <input class="checkbox" type="checkbox">
                            <span class="checkbox-details">免刷卡</span>  
                        </div>

                        <div class="input-box" style="">
                            <span class="details">戶籍郵遞區號</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">縣市</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">鄉鎮市區</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">街道</span>
                            <input type="text" placeholder="">
                        </div>
                    </div>

                    <div class="staff-details part3">
                        <div class="input-box" style="">
                            <span class="details">戶籍地址</span>
                            <input type="text" placeholder="">
                        </div>
                    </div>
                    
                    <div class="staff-details part2">
                        <div class="input-box">
                            <span class="details">通訊郵遞區號</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">縣市</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">鄉鎮市區</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box">
                            <span class="details">街道</span>
                            <input type="text" placeholder="">
                        </div>
                    </div>

                    <div class="staff-details part3">
                        <div class="input-box" style="">
                            <span class="details">通訊地址</span>
                            <input type="text" placeholder="">
                        </div>
                    </div>

                    <div class="staff-details part4">
                        <div class="input-box" style="">
                            <span class="details">手機1</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">手機2</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">電話</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">業績排序</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">轉帳銀行</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">轉帳帳號</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">帳戶名稱</span>
                            <input type="text" placeholder="">
                        </div>
                        <div class="input-box" style="">
                            <span class="details">帳戶統編</span>
                            <input type="text" placeholder="">
                        </div>
                    </div>

                </form>
            </div>

            <!--員工資料表格-->
            <div class="staff-table">
                <table  id="staffTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>

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


            
            // 處理點選員工表格後，得到那一列的 員工編號和 員工姓名, 並且自動填入到上面的員工資料
            // 步驟, 先將table的tr加入點選事件, 再寫方法獲取下方員工表格的值

            //為表格的列加上事件
            var staff_tb = document.getElementById('staffTable'); // 獲取 員工表格節點
            console.log("員工表格節點: ", staff_tb);
            var staff_tb_tbody_list = staff_tb.getElementsByTagName('tbody'); // 獲取 員工表格 tbody 節點串列
            console.log(staff_tb_tbody_list);
            var staff_tb_tbody = staff_tb_tbody_list[0]; // 獲取 員工表格 tbody 節點
            console.log("員工表格的tbody節點: ", staff_tb_tbody);

            function enterStaffinfo(e){
            // 處理點選員工表格後，得到那一列的 員工編號和 員工姓名, 並且自動填入到上面的員工資料
                //alert("You click the table! ");
                var target = e.target; //觸發事件的原件節點
                var tar1 = target.parentNode; // 觸發事件的原件節點的父節點, 其實也就是你點選的那一列 的 列節點
                console.log(tar1);
                
                var tar1Child = tar1.getElementsByTagName('td'); // 獲取列節點的子節點, 會獲得td節點
                console.log("列的td節點", tar1Child);
                
                var tar1Child_Child = tar1Child[0].childNodes;
                console.log("列的td節點的子節點: ", tar1Child_Child);

                
                var staff_Num = tar1Child[1].innerHTML; // 獲取員工表格的代碼 
                var staff_Name = tar1Child[2].innerHTML; // 獲取員工表格的姓名 
                console.log("員工代碼: " + staff_Num + "員工姓名:" + staff_Name);

                // 將從員工表格獲得的代碼和名字填入上面的資料中
                var staffNum = document.getElementById('staffNum');
                var staffName = document.getElementById('staffName');
                console.log(staffNum + " " + staffName);

                staffNum.value = staff_Num;
                staffName.value = staff_Name;
            } 
            
            // 從api獲得員工資料並且顯示下方員工表格當中
            staffQuery();
            function staffQuery(){
                /* step1. 從api獲得員工資料     */
                No = document.getElementById("staffNum");
                Name = document.getElementById("staffName");
                //alert('User_No='+x.value);
                
                //POST請求
                axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
                axios.post('https://webapi.vastar.com.tw/erpapi/api/Staff/List',{
                UserID: 'vastar',
                Password: 'vastar@2673',
                Staff_No: No.value,
                Name: '',
                FuzzySearch: ''
                })
                .then( (response) => {
                    console.log(response);
                    console.log("從api獲得的員工資料筆數: ", response.data.length);
                    
                    /*根據得到的response動態增加頁面下方的動態資料表格*/ 
                    // 先增加列 -> 欄位 -> 節點
                    for(var i=0; i<response.data.length; i++){
                        var tr = document.createElement('tr'); // 

                        var td1 = document.createElement('td');
                        var td2 = document.createElement('td');
                        var td3 = document.createElement('td');
                        var td4 = document.createElement('td');
                        var td5 = document.createElement('td');
                        var td6 = document.createElement('td');
                        var td7 = document.createElement('td');
                        var td8 = document.createElement('td');
                        var td9 = document.createElement('td');

                        var text1 = document.createTextNode(i+1);
                        var text2 = document.createTextNode(response.data[i].Staff_No);
                        var text3 = document.createTextNode(response.data[i].Name);
                        var text4 = document.createTextNode("");
                        var text5 = document.createTextNode("");
                        var text6 = document.createTextNode("");
                        var text7 = document.createTextNode("");
                        var text8 = document.createTextNode("");
                        var text9 = document.createTextNode("");

                        td1.appendChild(text1);
                        td2.appendChild(text2);
                        td3.appendChild(text3);
                        td4.appendChild(text4);
                        td5.appendChild(text5);
                        td6.appendChild(text6);
                        td7.appendChild(text7);
                        td8.appendChild(text8);
                        td9.appendChild(text9);

                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td5);
                        tr.appendChild(td6);
                        tr.appendChild(td7);
                        tr.appendChild(td8);
                        tr.appendChild(td9);


                        staff_tb_tbody.appendChild(tr);
                        tr.addEventListener('click', enterStaffinfo, false);  // 為表格列添加事件
                    }
                })
                .catch( (error) => console.log(error));
            }



        </script>
    </body>
</html>