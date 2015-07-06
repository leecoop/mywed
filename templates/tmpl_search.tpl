{include file="common/header.tpl"}

<body dir="rtl" bgcolor="#F8F8F8">
<div id="main">
    {include file="common/head.tpl"}
    <div id="site_content">
        <div class="top_box_div">


            <div class="site_content_small">
                <div class="box_title">
                    <div class="title_text">חיפוש</div>
                </div>

                <div style="float:right; padding-right:40px">
                    <table style="padding:10px">

                        <tr>
                                                               {*<input class="registerBtn" id="search_id_number_button" name="search_id_number_button" type='submit' value='חפש' onclick="makeSearch('search_id_number')"  /></td>*}
                            <td align="right">
                                <input style="width: 300px" type="text" id="search_text" name="search_text" dir="rtl"
                                       class="leadnews" onkeypress="searchKeyPress(event)"/>
                            </td>
                            <td>
                                <button id="search" onclick="search()" class="registerBtn">חפש</button>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


        <div id="searchContent">
            <fieldset class="border1 padd5 bg3 border_radius">
                <center>
                    <h5>אנא הזינו ערך לחיפוש</h5>
                </center>
            </fieldset>
        </div>
    </div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>
{*{include file="add_new_guest.tpl"}*}
{include file="edit_guest.tpl"}

{include file="common/footer.tpl"}

