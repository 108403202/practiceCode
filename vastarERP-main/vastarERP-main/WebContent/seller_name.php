<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>銷售人員選單</title>
    <link href="statics\css\searchform.css" rel="stylesheet">
    <link href="menu_style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
    function test(test) {
        alert(test);
    }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type='text/javascript'>
    window.onload = function() {
        var searchvalue = window.opener.document.getElementById('seller').value.length;
        var table = document.getElementById("seller_table");
        var rowCount = table.rows.length;
        console.log(rowCount);
        console.log(searchvalue);
        if (rowCount == 1 && searchvalue > 0) {
            axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
            axios.post('https://webapi.vastar.com.tw/erpapi/api/Staff/List', {
                    UserID: 'vastar',
                    Password: 'vastar@2673',
                    Staff_No: '',
                    Name: '',
                    FuzzySearch: window.opener.document.getElementById('seller').value

                })
                .then((response) => {
                    console.log(response);
                    console.log(response.data.length);
                    console.log(response.data)
                    if (response.data[0]["Result"] == 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            var element = document.createElement("input");
                            element.type = "button";
                            element.value = "確認";
                            element.addEventListener('click', function handleClick(event) {
                                var index = $(this).closest('tr').index();
                                var table = document.getElementById('seller_table');
                                window.opener.document.getElementById('seller').value = table.rows[
                                    index].cells[2].innerHTML;
                                window.close();
                            });
                            var row = table.insertRow(rowCount);
                            row.insertCell(0).appendChild(element);
                            row.insertCell(1).innerHTML = response.data[i]["Staff_No"];
                            row.insertCell(2).innerHTML = response.data[i]["Name"];

                        }
                    }
                    // response.data.forEach(function(value){
                    //     table.HTML = value["Customer_No"];
                    // });
                })
                .catch((error) => console.log(error));
        }
    }
    </script>
</head>

<body bgcolor="#E0E0E0">

    <div>
        <form method="post" action="" class="form-query">

            <div class="input">
                <div>
                    <label for="Counter_No">編號</label>
                    <input type="text" id="Staff_No" name="Staff_No" size="10">
                </div>

                <div>
                    <label for="Counter_Name">名稱</label>
                    <input type="text" id="Staff_Name" name="Staff_Name" size="10">
                </div>
                <div>
                    <label for="FuzzySearch">模糊收尋</label>
                    <input type="text" id="FuzzySearch" name="FuzzySearch" size="10">
                </div>
            </div>


            <div class="action">
                <div class="div-form-button">
                    <input type="submit" name="action" value="查詢"></input>
                </div>

                <div class="div-form-button">
                    <input type="submit" name="action" value="新增"></input>
                </div>

                <div class="div-form-button">
                    <input type="submit" name="action" value="刪除"></input>
                </div>
            </div>


        </form>

    </div>
    <center>
        <table id="seller_table" border="1" rules="all" cellpadding="5" cellspacing="50" style=" font-size:14px; border: 0.5px solid ; 
           border-collapse: collapse; width: 790px; ">
            <tr bgcolor="#828282" height="30" align="center">
                <td width="40"></td>
                <td>員工序號</td>
                <td>員工姓名</td>
            </tr>
            <?php
            function httpRequest($api, $data_string)
            {
                $ch = curl_init($api);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string)
                    )
                );
                $result = curl_exec($ch);
                curl_close($ch);
                return json_decode($result, true);
            }

            if (@$_POST['action'] == "查詢") {
                $Staff_No = $_POST['Staff_No'];
                $Staff_Name = $_POST['Staff_Name'];
                $FuzzySearch = $_POST['FuzzySearch'];
                $data = [

                    "UserID" => "vastar",
                    "Password" => "vastar@2673",
                    "Staff_No" => $Staff_No,
                    "Name" => $Staff_Name,
                    "FuzzySearch" => $FuzzySearch


                ];
                $data = httpRequest('https://webapi.vastar.com.tw/erpapi/api/Staff/List', json_encode($data));
                if ($data[0]["Result"] == -1) {

                    header("refresh:0;url=purchaser_name.php");
                } else {
                }
                foreach ($data as $value) { {
                        echo "<tr bgcolor='#E3E3E3'>";
                        echo "<td>" . "<input type='button' class='btn' value='確認' name='" . $value["Staff_No"] . "[]' class=placelist>" . "</td>";
                        echo "<td contenteditable='true' align='center' onclick='Place_No'>" . $value["Staff_No"] .  "</td>";
                        echo "<td contenteditable='true' align='center' onclick='Name'>" . $value["Name"] .  "</td>";

                        echo "</tr>";
                    }
                }
            }


            ?>
        </table>
        <script>
        < script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" >
</script>
        <script type="text/javascript">
        $(function() {
            var el = document.querySelectorAll('.btn');
            var table = document.getElementById('seller_table');

            el.forEach(function(button) {
                button.addEventListener('click', function() {
                    var index = $(this).closest('tr').index(); // 檢索目前元素最近的tr元素
                    

                    var staff_name = document.getElementById('Staff_Name');
                    staff_name.value = table.rows[index].cells[2].innerHTML ;
                    
                    console.log("員工名稱: ", staff_name.value);
                    

                    window.opener.document.getElementById('seller').value = table.rows[index].cells[2].innerHTML; // 把選取的值, 填入銷貨單頁面

                    // 將員工代號儲存到localStorage
                    localStorage.setItem('Sales_No', table.rows[index].cells[1].innerHTML);
                    window.close();
                });
            })
            //Assign Click event to Button.
            // $("#btnGet").click(function() {
            //     var name = ""
            //     //Loop through all checked CheckBoxes in GridView.
            //     $("#purchaser_data_table input[type=checkbox]:checked:first").each(function() {

            //         var row = $(this).closest("tr")[0];
            //         name += row.cells[2].innerHTML;


            //     });

            //     window.opener.document.getElementById('seller').value = name;
            //     window.close();

            // });
        });
        </script>
        </script>
</body>

</html>