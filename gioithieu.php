<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("headertc.php");
include ('ketnoi.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thongtinkhach.css" />
    <link rel="stylesheet" href="css/gioithieu.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
</head>

<body>
    <div class="khung-chua">
        <div class="image-bia">
            <img class="img-bia" src="anhtin/a1.jpg" />
        </div>
        <div class="center_info">
            <div class="title">
                <label class="title1">
                    <a>THE ROSE HOTEL</a>
                </label>
                <label class="title2">
                    <a>"</a>
                    <p>Trải nghiệm khách sạn theo tiêu chuẩn 3 sao</p>
                    <a>"</a>
                </label>
            </div>
            <div class="gioithieu">
                <label class="gioithieu2">
                    <p>The Rose Hotel là khách sạn sang trọng nằm ở trung tâm Thành phố Trà Vinh, là lựa chọn lý tưởng
                        cho những ai muốn trải nghiệm dịch vụ đẳng cấp và tiện nghi hiện đại. Khách sạn này mang đến
                        không gian sống tinh tế, hài hòa, cùng hàng loạt tiện ích giải trí và thư giãn, hứa hẹn sẽ đem
                        lại cho bạn và gia đình một kỳ nghỉ đáng nhớ.</p>
                    <p>Dù bạn đi du lịch cùng gia đình hay chỉ đơn thuần là muốn tìm một không gian riêng tư, The Rose
                        Hotel đều có thể đáp ứng mọi nhu cầu. Đây là địa điểm lý tưởng cho những ai muốn tận hưởng kỳ
                        nghỉ thoải mái mà vẫn tiết kiệm chi phí, với mức giá vô cùng hợp lý.</p>
                    <p>The Rose Hotel mang đẳng cấp 3 sao, với những thiết kế hiện đại và trang bị đầy đủ tiện nghi,
                        cùng với khu vực thư giãn cho khách hàng có thể ngắm nhìn toàn cảnh Thành phố Trà Vinh. Với vị
                        trí thuận lợi ngay trung tâm, The Rose Hotel là điểm dừng chân hoàn hảo cho mọi du khách khi đến
                        với Trà Vinh, mang lại những trải nghiệm lưu trú tuyệt vời và dịch vụ chất lượng cao.</p>
                </label>
            </div>

        </div>

        <div class="center_info">
            <div class="gioithieu1">
                <label class="gioithieu2">
                    <h5>Giới thiệu về dịch vụ ẩm thực khách sạn</h5>
                    <p>
                        Ngoài không gian quán cà phê, chúng tôi còn hân hạnh giới thiệu đến quý
                        khách dịch vụ ẩm thực tại khách sạn của chúng tôi. </p>
                    <span>Không gian ấm cúng và sang trọng</span>
                    <p>Không gian quán cà phê và nhà hàng của chúng tôi được thiết kế để mang lại cảm giác ấm cúng và
                        sang trọng. Với ánh sáng dịu nhẹ, âm nhạc du dương và không khí trong lành, đây là nơi lý tưởng
                        để quý khách thư giãn và thưởng thức những món ăn ngon miệng. Chúng tôi luôn chú trọng đến từng
                        chi tiết nhỏ nhất để đảm bảo không gian luôn thoải mái và dễ chịu.</p>
                    <span>Đa dạng món ăn và thức uống</span>
                    <p>Không chỉ chuyên về cà phê, chúng tôi còn cung cấp một thực đơn phong phú với các món ăn hấp dẫn
                        từ ẩm thực địa phương. Các đầu bếp tài năng của chúng tôi luôn sáng tạo và tinh tế trong việc
                        chế biến, mang đến những món ăn không chỉ ngon miệng mà còn đẹp mắt.</p>
                    <span>Đội ngũ phục vụ chuyên nghiệp</span>
                    <p>Đội ngũ nhân viên phục vụ của chúng tôi luôn tận tâm và chuyên nghiệp, sẵn sàng đáp ứng mọi nhu
                        cầu của quý khách. Chúng tôi luôn lắng nghe và nỗ lực hết mình để mang đến cho quý khách những
                        trải nghiệm ẩm thực tuyệt vời nhất.</p>
                </label>
            </div>

            <div class="title-1">
                <label class="title3">
                    <a>THE PLACE FOR THE GREAT SOUL</a>
                </label>
                <label class="title4">
                    <a>"</a>
                    <p>Nơi hội tụ của những tâm hồn lớn</p>
                    <a>"</a>
                </label>
                <img class="imgkvan" src="./anhtin/anhkhuvuc.jpg" />

            </div>
        </div>
        <div class="gioi-thieu-food">
            <div class="khung-chua-gt">
                <div class="w3-content w3-section" style="width:30%;">
                    <img class="mySlides mySlides1" src="./anhtin/caphechon.jpg" style="width:100%">
                    <img class="mySlides mySlides1" src="./anhtin/cfchon.jpg" style="width:100%">
                </div>

                <div class="intro-cf">
                    <h4>Cà phê Legend, chỉ có duy nhất ở Trung Nguyên Lgend</h4>
                    <p> Nguyên liệu được chắt lọc từ hạt cà phê nguyên gốc, tinh tuý và ngon nhất trên thế
                        giới như Ethiopia, Jamaica, Brazil và Việt Nam.</p>
                    <span>Quá trình sản xuất độc đáo.</span>
                    <p>Phương pháp ủ men sinh học, tái tạo thành công quy trình ấp ủ cà phê thực sự diễn ra
                        trong bao tử chồn Hương hoang dã, kết hợp với bí quyết huyền bí phương đông, cùng
                        với tình yêu, lòng đam mê và sự tỉ mỉ trong từng công đoạn.</p>
                    <span>Đẳng cấp và sang trọng.</span>
                    <p>Cà phê chồn của Trung Nguyên Legend không chỉ là một loại thức uống, mà còn là biểu tượng của sự
                        sang trọng và đẳng cấp. Sản phẩm này được đóng gói trong những bao bì cao cấp, là món quà quý
                        giá dành tặng cho đối tác, người thân và bạn bè.</p>
                </div>
            </div>
        </div>

        <div class="gg-map">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.852430835584!2d106.34004369999998!3d9.946233700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a010aeae6bef9f%3A0xa2399b7a88ca3bb1!2zMjQwIFBo4bqhbSBOZ8WpIEzDo28sIFBoxrDhu51uZyAxLCBUcsOgIFZpbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1718272099854!5m2!1svi!2s"
                    width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="phone-button">
            <a href="tel:+0903345615">
                <i class="fa-solid fa-phone"></i>0903 345 615
            </a>
        </div>

        <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">
        <i style="font-size: 18px;color:white;" class="fa-solid fa-arrow-up"></i>
    </button>
    </div>
</body>
<style>
    .optionn>:nth-child(2) {
        text-shadow: 1px 3px 4px #EE4E4E;
        color: #B20600;
    }
</style>
<?php
include ("footertc.php");
?>
<script>

let mybutton = document.getElementById("scrollToTopBtn");
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

//scroll to the top
function topFunction() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0; 
}
</script>
<script>
    var myIndex1 = 0;
    var myIndex2 = 0;
    var myIndex3 = 0;
    carousel1();
    carousel2();
    carousel3();

    function carousel1() {
        var i;
        var x = document.getElementsByClassName("mySlides1");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex1++;
        if (myIndex1 > x.length) { myIndex1 = 1 }
        x[myIndex1 - 1].style.display = "block";
        setTimeout(carousel1, 3000); 
    }

</script>