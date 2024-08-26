<!DOCTYPE html>
<html lang="en">

<head>
    <title>預購憑單</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="statics/css/pre_order_voucher.css" rel="stylesheet">
    <!--loding.css-->
    <!--<link href="statics/css/loding.css" rel="stylesheet">-->
    <!--Boxicons CDN Links -->
    <link href='https://unpkg.com/boxicons@2.1.3/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript">
    function test(test) {
        //頁面跳轉
        window.open('add_product.php', config = 'height=300,width=500', target = '_self');
    }
    </script>

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
        <!--part1 -->
        <!--home-content算做 part1 -->
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <img class="vastar-logo" src="statics/img/vastar_logo.png" alt="vastar_logo">
            <span class="title">廣南國際有限公司</span>
            <span class="title_en">Vastar International Corporation</span>
            <!--<span class="document-title">預購憑單</span>-->
            <!--選擇選單-->
            <div class="select">
                <select name="type_select" onChange="location = this.options[this.selectedIndex].value;">
                    <option value="pre_order_voucher_ver2.php">預購憑單</option>
                    <option value="Sidebar.php">銷貨(退)憑單</option>
                </select>
            </div>

        </div>

        <!--part2 -->
        <form action="#">
            <div class="container">
                <!-- container 算做 part2 -->

                <!--承購人, 聯絡電話, 收貨人-->
                <div class="customer-info">
                    <div class="input-box">
                        <span class="info">承購人</span>
                        <input type="text" name="purchaser_name" id="purchasenameid" placeholder="陳小明" required>
                        <input type="button" name="purchaser_name_button" class="query-btn" value="查詢"
                            onclick="window.open('purchaser_name.php',config='height=300,width=500',target='_self');" />
                    </div>
                    <div class="input-box">
                        <span class="info">連絡電話</span>
                        <input type="text" name="purchaser_phone_number" id="purchasephoneid" placeholder="0912345678"
                            required>
                        <input type="button" name="purchaser_phone_number_button" class="query-btn" value="查詢"
                            onclick="window.open('purchaser_name.php',config='height=300,width=500',target='_self');">
                    </div>
                    <div class="input-box">
                        <span class="info">收貨人</span>
                        <input type="text" name="receiver_name" id="receivenameid" placeholder="陳小明" required>
                        <input type="button" name="receiver_name_button" class="query-btn" value="查詢"
                            onclick="window.open('receiver_name.php',config='height=300,width=500',target='_self');">
                    </div>
                </div>

                <!--銷貨地點, 銷貨人員, 製單人員-->
                <div class="sales-info">
                    <div class="input-box">
                        <span class="info">銷貨地點</span>
                        <input type="text" name="place_sale" placeholder="SOGO忠孝" required>
                        <input type="button" name="place_sale_button" class="query-btn" value="查詢"
                            onclick="window.open('place_sale.php',config='height=300,width=500',target='_self');">
                    </div>
                    <div class="input-box">
                        <span class="info">銷售人員</span>
                        <input type="text" id="seller" placeholder="陳瑞彬" required>
                        <input type="button" name="seller_name_button" class="query-btn" value="查詢"
                            onclick="window.open('seller_name.php',config='height=300,width=500',target='_self');" />
                    </div>
                    <div class="input-box">
                        <span class="info">製單人員</span>
                        <input type="text" id='making_name' placeholder="陳瑞彬" required>
                        <input type="button" class="query-btn" value="查詢"
                            onclick="window.open('making_staff_name.php',config='height=300,width=500',target='_self');">
                    </div>
                </div>

                <!--單號, 銷售日期起, 銷售日期迄-->
                <div class="sales-date">
                    <div class="input-box">
                        <span class="info">單號</span>
                        <input type="text" placeholder="03-AZ213546" required>
                        <input type="button" class="query-btn" value="查詢"
                            onclick="window.open('order_number.php',config='height=300,width=500',target='_self');">
                    </div>
                    <div class="input-box">
                        <span class="info">銷售日期起</span>
                        <input type="date" required>
                    </div>
                    <div class="input-box">
                        <span class="info">銷售日期迄</span>
                        <input type="date" required>
                        <input type="button" value="發票" class="bill">
                    </div>
                    <div class="select">
                        <select name="account_type_select"
                            onChange="location = this.options[this.selectedIndex].value;">
                            <option value="pre_order_voucher_ver2.php">總公司入帳</option>
                            <option value="department_store_entry.php">百貨公司入帳</option>
                        </select>
                    </div>


                </div>
            </div>
        </form>


        <!--part3 -->
        <!--中間的銷貨單內容表格列數先設定只有一個-->
        <div class="sales-table" id="sales-table">
            <table rules="all" cellpadding="10" cellspacing="50" id="inside-sales-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>產品名稱</th>
                        <th>數量</th>
                        <th>單價</th>
                        <th>金額</th>
                        <th>銷售別</th>
                        <th>出貨明細</th>
                        <th>備註欄</th>
                    </tr>
                </thead>
                <tbody>
                    <tr contenteditable="false">
                        <td contenteditable="false">1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">6</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">7</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">8</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">9</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr contenteditable="false">
                        <td contenteditable="false">10</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select id="sale_category" name="sale_category">
                                <option value="銷售">銷售</option>
                                <option value="贈品">贈品</option>
                                <option value="銷退">銷退</option>
                                <option value="贈品銷退">贈品銷退</option>
                                <option value="贈品銷退">贈品補差額</option>
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <!--part4 -->
        <!--已付款, 餘額, 預購暫收, 預購溢收-->
        <form action="#">
            <div class="footer-form">
                <div class="payment-info">
                    <div class="input-box">
                        <span class="info">已付款</span>
                        <input type="text" placeholder="140">
                    </div>
                    <div class="input-box">
                        <span class="info">餘額</span>
                        <input type="text" placeholder="140">
                    </div>
                    <div class="input-box">
                        <span class="info">預購暫收</span>
                        <input type="text" placeholder="140">
                    </div>
                    <div class="input-box">
                        <span class="info">預購溢收</span>
                        <input type="text" placeholder="140">
                    </div>
                </div>

                <!--總金額, 折扣金額,折扣%數, 銷售額-->
                <div class="total-info">
                    <div class="input-box">
                        <span class="info">總金額</span>
                        <input type="text" id="lumpSum" disabled>
                    </div>
                    <div class="input-box">
                        <span class="info">折扣金額</span>
                        <input type="text"  class="discount_calculate" id='discount_amount'>
                    </div>
                    <div class="input-box">
                        <span class="info">折扣%數</span>
                        <input type="text"  class="discount_calculate" id='discount_percent'>
                    </div>
                    <div class="input-box">
                        <input type="button" value="預購總金額" class="sales-summury"
                            onclick="window.open('pre_sales.html',config='height=300,width=500',target='_self');">
                        <input type="text" placeholder="0" id="sales-summury">
                    </div>
                    <div class="input-box">
                        <span class="info">收銀機入賬金額</span>
                        <input type="text" placeholder="0">
                    </div>
                </div>
            </div>

        </form>
        <!--part5 -->
        <!--單據審核, 核准, 掛載, 新增, 刪除, 下一筆-->
        <div class="somebtn">
            <div class="tool-box">
                <!--單據審核, 核准, -->
                <div class="check-box check1">
                    <input type="button" class="audit-btn" value="單據審核">
                    <input type="text" id='review' placeholder="name1" required>
                    <input type="button" class="query-btn" value="查詢"
                        onclick="window.open('document_review.php',config='height=300,width=500',target='_self');">
                </div>
                <div class="check-box check2">
                    <input type="button" class="approved-btn" value="核准">
                    <input type="text" placeholder="name1" required>
                    <input type="button" class="query-btn" value="查詢"
                        onclick="window.open('approve.php',config='height=300,width=500',target='_self');">
                </div>
                <!-- 掛載, 新增, 刪除, 下一筆-->
                <div class="check-box">
                    <input type="button" value="掛載" class="some-btn">
                    <input type="button" value="新增" class="some-btn">
                    <input type="button" value="刪除" class="some-btn">
                    <input type="button" value="下一筆" class="some-btn">
                </div>
            </div>
        </div>


        <script>
        // 讓下拉可以呈現sub-menu的功能
        let arrow = document.querySelectorAll(".arrow");
        /*選取所有class name有 arrow的選擇器
                    然後建立一個串列，基本上就是所有有下拉icon的*/
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;

                arrowParent.classList.toggle("showMenu");
            });
        }

        // 讓sidebar縮小至左邊的功能
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        // 左下角登出icon加入登出功能
        let logoutBtn = document.querySelector(".bx-log-out");
        console.log(logoutBtn);
        logoutBtn.addEventListener('click', () => {
            console.log(document.cookie); // 會得到一串cookie值是以分號串接的cookie
            var cuser_name = getCookie("cuser_name");
            alert(cuser_name + "\n確定要登出嗎?");
            window.location = "login.html"; // 登出跳轉回登入頁面
        });

        //用來讀取想要的cookie值
        function getCookie(name) {
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

        // 開啟產品名稱頁面
        function openAddProduct() {
            //頁面跳轉
            window.open('add_product.php', config = 'height=300,width=500', target = '_self');
        }

        function openSalesDetail() {
            window.open('saledetail.php', config = 'height=300,width=500', target = '_self');

        }

        // 給中間的銷貨單表格增加或減少產品
        // 修改特定列資料所要用的方法: 
        // 取得點選的表格欄位
        var salestab = document.getElementById("inside-sales-table");
        console.log(salestab);
        var salestab_tbody_list = salestab.getElementsByTagName("tbody")[0].getElementsByTagName('tr');
        console.log("中間表格的每一列節點: ", salestab_tbody_list);
        for (var i = 0; i < salestab_tbody_list.length; i++) {
            //為每一列的 產品名稱欄位 添加事件
            td = salestab_tbody_list[i].getElementsByTagName('td')[1];
            sales_deatil = salestab_tbody_list[i].getElementsByTagName('td')[6];
            td.addEventListener("click", getClickTd, false);
            td.addEventListener("click", openAddProduct, false);
            sales_deatil.addEventListener("click", openSalesDetail, false);
            console.log(td);
        }
        var trNo = ""; // 被點選的td編號, 並在之後用cookie存取, 方便add_product頁面使用
        function getClickTd(e, trNo) {
            target = e.target; // 點選的欄位
            console.log("target: ", target);
            childNodesLength = target.childNodes.length; // 觸發元件的子串列, 如果>0, 代表有元素
            console.log("childNodesLength: ", childNodesLength);
            trNo = target.parentNode.getElementsByTagName('td')[0].firstChild.nodeValue;
            console.log("被點選的Td節點: ", target);
            console.log("被點選的Td節點編號: ", trNo);

            // 去判斷是要修改, 或是要新增, 
            // 如果是修改就設定 trClicked = trNo ;  
            // 如果是空白新增, 則設定 trClicked = 0 ;
            if (childNodesLength > 0) {
                console.log("修改");
                document.cookie = `trClicked = ${trNo}; path=/; max-age=3600;`; // 將點選的列 給定tdClicked cookie變數
            } else {
                console.log("新增");
                trNo = 0;
                document.cookie = `trClicked = ${trNo}; path=/; max-age=3600;`;
            }
        }

        document.querySelectorAll('.discount_calculate')
            .forEach(e => e.addEventListener('input', function() {
                var lumpSumPosition = document.getElementById('lumpSum');
                var discount_amount = document.getElementById('discount_amount');
                var discount_percent = document.getElementById('discount_percent');
                var sales_summury = document.getElementById('sales-summury')
                if (parseInt(discount_percent.value) > 100) {
                    discount_percent.value = 100;
                } else if (parseInt(discount_percent.value) < 0) {
                    discount_percent.value = 0;
                }
                if (parseInt(discount_amount.value) > parseInt(lumpSumPosition.value)) {

                    discount_amount.value = lumpSumPosition.value
                } else if (parseInt(discount_amount.value) < 0) {
                    discount_amount.value = 0
                }
                if (lumpSumPosition != '<br>' && e.id == 'discount_amount') {
                    discount_percent.value = (discount_amount.value / lumpSumPosition.value * 100).toFixed(2);
                    sales_summury.value = lumpSumPosition.value - discount_amount.value;
                } else if (lumpSumPosition != '<br>' && e.id == 'discount_percent') {
                    discount_amount.value = (lumpSumPosition.value *
                        discount_percent.value / 100).toFixed(2);
                    sales_summury.value = lumpSumPosition.value - discount_amount.value;

                }
            }));
        </script>
        </div>
</body>

</html>