<?php
/**
 * @Author	HaiNM - VTT - BreadnTea
 * @Mail	nguyenminhhai@breadntea.vn
 */
namespace App\Libraries;

use App\Libraries\Library;

class EmailTemps extends Library
{
	private $logo = null;
	
	private $kmd2021 = null;
	
	private $txtcode = null;
	
	private $qrcode = null;
	
    protected function __construct()
    {
		$this->logo = base_url('assets/email/logo.png');
		$this->kmd2021 = base_url('assets/email/kmd2021.png');
		$this->txtcode = 'KMD01234';
		$this->qrcode = base_url('assets/email/qrcode.png');
	}
	
	public function setQRCode(string $_code = '')
	{
		$urlCode = sprintf('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=150x150&chl=%s', $_code);
		$this->txtcode = $_code;
		$this->qrcode = $urlCode;
	}
	
	public function handleTemp(int $_type = 0)
	{
		$content = null;
		
		if($_type === 1)
		{
			$content = $this->handleHTML1();
		}
		else if($_type === 2)
		{
			$content = $this->handleHTML2();
		}
		else if($_type === 3)
		{
			$content = $this->handleHTML3();
		}
		else if($_type === 4)
		{
			$content = $this->handleHTML4();
		}
		else if($_type === 5)
		{
			$content = $this->handleHTML5();
		}
		else if($_type === 6)
		{
			$content = $this->handleHTML6();
		}
		else if($_type === 7)
		{
			$content = $this->handleHTML7();
		}
		else if($_type === 8)
		{
			$content = $this->handleHTML8();
		}
		else if($_type === 9)
		{
			$content = $this->handleHTML9();
		}
		
		$html = $this->defautHMTL($content);
		return $html;
	}
	
	private function handleHTML1()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'.($this->imageHMTL()).'</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Chúc mừng bạn đã nhận được cặp vé xem phim <b>NGHỀ SIÊU KHÓ</b> vào lúc <b>14:00, Thứ 7, ngày 17/04/2021</b> trong sự kiện "2021 Korea Movie Day" do Tổng cục Du lịch Hàn Quốc tại Việt Nam tổ chức.</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại rạp CGV Vincom Đà Nẵng <u>để đổi vé trước 13:30 ngày 17/04</u>. <br>Sau thời gian này quầy đổi vé sẽ đóng cửa.</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">
											Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO nhé!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<h3 style="font-size: 15px; color:#222; text-transform: uppercase; padding: 8px 0 4px 0;"><b>Thông tin chương trình</b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p><span style="color: red;">Thời gian</span>: Thứ 7, ngày <b>17/04: 14h00</b> – Phim: <b>NGHỀ SIÊU KHÓ</b>.</p></li>
											<li><p><span style="color: red;">Địa điểm</span>: Rạp chiếu phim CGV Vincom Đà Nẵng - Tầng 4, TTTM Vincom Đà Nẵng, Đường Ngô Quyền, Phường An Hải Bắc, Quận Sơn Trà, Thành phố Đà Nẵng.</p></li>
										</ul>
										<p style="font-size: 15px; color:#222;">Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!</p>
										<p style="font-size: 15px; color:#222;">Hẹn gặp lại bạn tại Ngày hội du lịch Hàn Quốc qua màn ảnh rộng 2021 Korea Movie Day tại Đà Nẵng!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}
	
	private function handleHTML2()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'.($this->imageHMTL()).'</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Chúc mừng bạn đã nhận được cặp vé xem phim <b>CỤC NỢ HÓA CỤC CƯNG</b> vào lúc <b>14:00 Chủ Nhật, ngày 18/04/2021</b>  trong sự kiện "2021 Korea Movie Day" do Tổng cục Du lịch Hàn Quốc tại Việt Nam tổ chức.</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại rạp CGV Vincom Đà Nẵng <u>để đổi vé trước 13:30 ngày 18/04</u>. <br>Sau thời gian này quầy đổi vé sẽ đóng cửa.</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">
											Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO nhé!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<h3 style="font-size: 15px; color:#222; text-transform: uppercase; padding: 8px 0 4px 0;"><b>Thông tin chương trình</b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p><span style="color: red;">Thời gian</span>: Chủ nhật, ngày <b>18/04: 14h00</b> – Phim: <b>CỤC NỢ HÓA CỤC CƯNG</b>.</p></li>
											<li><p><span style="color: red;">Địa điểm</span>: Rạp chiếu phim CGV Vincom Đà Nẵng - Tầng 4, TTTM Vincom Đà Nẵng, Đường Ngô Quyền, Phường An Hải Bắc, Quận Sơn Trà, Thành phố Đà Nẵng.</p></li>
										</ul>
										<p style="font-size: 15px; color:#222;">Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!</p>
										<p style="font-size: 15px; color:#222;">Hẹn gặp lại bạn tại Ngày hội du lịch Hàn Quốc qua màn ảnh rộng 2021 Korea Movie Day tại Đà Nẵng!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
		';
	}

	private function handleHTML3()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'.($this->imageHMTL()).'</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Chúc mừng bạn đã nhận được cặp vé xem phim <b>NGHỀ SIÊU KHÓ</b> vào lúc <b>14:00 ngày Chủ Nhật, 25/04/2021</b> trong sự kiện "2021 Korea Movie Day" do Tổng cục Du lịch Hàn Quốc tại Việt Nam tổ chức.</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại rạp CGV Vincom Xuân Khánh <u>để đổi vé trước 13:30 ngày 25/04</u>. <br>Sau thời gian này quầy đổi vé sẽ đóng cửa.</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b><u>THỜI GIAN MỞ CỬA QUẦY ĐỔI VÉ KTO</u></b></p>
										<p style="font-size: 15px; color: red;"><b>- Tại CGV Vincom Xuân Khánh: từ 11:00 ngày 24/4/2021 - 16:00 ngày 25/4/2021</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">
											Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO nhé!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<h3 style="font-size: 15px; color:#222; text-transform: uppercase; padding: 8px 0 4px 0;"><b>Thông tin chương trình</b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p><span style="color: red;">Thời gian</span>: Ngày <b>25/04: 14h00</b> – Phim: <b>NGHỀ SIÊU KHÓ</b>.</p></li>
											<li><p><span style="color: red;">Địa điểm</span>: Rạp chiếu phim CGV Vincom Xuân Khánh - Tầng 5, Tòa nhà 209, Đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ.</p></li>
										</ul>
										<p style="font-size: 15px; color:#222;">Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!</p>
										<p style="font-size: 15px; color:#222;">Hẹn gặp lại bạn tại Ngày hội du lịch Hàn Quốc qua màn ảnh rộng 2021 Korea Movie Day tại Cần Thơ!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}

	private function handleHTML4()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'.($this->imageHMTL()).'</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Chúc mừng bạn đã nhận được cặp vé xem phim <b>KẺ SĂN MỘ</b> vào lúc <b>16:00 ngày Chủ nhật, ngày 25/04/2021</b> trong sự kiện "2021 Korea Movie Day" do Tổng cục Du lịch Hàn Quốc tại Việt Nam tổ chức.</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại rạp CGV Vincom Xuân Khánh <u>để đổi vé trước 15:30 ngày 25/04</u>. <br>Sau thời gian này quầy đổi vé sẽ đóng cửa.</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b><u>THỜI GIAN MỞ CỬA QUẦY ĐỔI VÉ KTO</u></b></p>
										<p style="font-size: 15px; color: red;"><b>- Tại CGV Vincom Xuân Khánh: từ 11:00 ngày 24/4/2021 - 16:00 ngày 25/4/2021</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">
											Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO nhé!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<h3 style="font-size: 15px; color:#222; text-transform: uppercase; padding: 8px 0 4px 0;"><b>Thông tin chương trình</b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p><span style="color: red;">Thời gian</span>: Ngày <b>25/04: 16h00</b> – Phim: <b>KẺ SĂN MỘ</b>.</p></li>
											<li><p><span style="color: red;">Địa điểm</span>: Rạp chiếu phim CGV Vincom Xuân Khánh - Tầng 5, Tòa nhà 209, Đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ.</p></li>
										</ul>
										<p style="font-size: 15px; color:#222;">Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!</p>
										<p style="font-size: 15px; color:#222;">Hẹn gặp lại bạn tại Ngày hội du lịch Hàn Quốc qua màn ảnh rộng 2021 Korea Movie Day tại Cần Thơ!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}

	private function handleHTML5()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'. $this->noQRCodeHMTL(). '</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Tổng cục Du lịch Hàn Quốc tại Việt Nam xin chúc mừng bạn đã nhận được 01 cặp vé xem phim trong sự kiện <b>"2021 Korea Movie Day - Ngày hội du lịch Hàn Quốc qua màn ảnh rộng".</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại sự kiện <u>để đổi vé trước suất chiếu ít nhất 30 phút.</u></b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b><u>THỜI GIAN MỞ CỬA QUẦY ĐỔI VÉ KTO</u></b></p>
										<p style="font-size: 15px; color: red;margin-left: 20px;"><b>- Tại CGV Vincom Đà Nẵng: từ 11:00, ngày 17/04/2021</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO! Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">Ngoài ra KTO còn có rất nhiều event với giải thưởng hấp dẫn như tai nghe Galaxy Buds Live thời thượng tại Facebook: <a target="_blank" href="https://www.facebook.com/KTOVietNam">https://www.facebook.com/KTOVietNam</a>
										</p>
										<p style="font-size: 15px; color:#222;">Các bạn hãy tham gia để có cơ  hội nhận được nhiều phần quà giá trị nhé!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}
	
	private function handleHTML6()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'. $this->noQRCodeHMTL(). '</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Tổng cục Du lịch Hàn Quốc tại Việt Nam xin chúc mừng bạn đã nhận được 01 cặp vé xem phim trong sự kiện <b>"2021 Korea Movie Day - Ngày hội du lịch Hàn Quốc qua màn ảnh rộng".</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại sự kiện <u>để đổi vé trước suất chiếu ít nhất 30 phút.</u></b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b><u>THỜI GIAN MỞ CỬA QUẦY ĐỔI VÉ KTO</u></b></p>
										<p style="font-size: 15px; color: red;margin-left: 20px;"><b>-  Tại CGV Vincom Đà Nẵng: từ 11:00 ngày 17/04/2021 - 16:00 ngày 18/04/2021</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO! Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">Ngoài ra KTO còn có rất nhiều event với giải thưởng hấp dẫn như tai nghe Galaxy Buds Live thời thượng tại Facebook: <a target="_blank" href="https://www.facebook.com/KTOVietNam">https://www.facebook.com/KTOVietNam</a>
										</p>
										<p style="font-size: 15px; color:#222;">Các bạn hãy tham gia để có cơ  hội nhận được nhiều phần quà giá trị nhé!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}
	
	private function handleHTML7()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'. $this->noQRCodeHMTL(). '</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Tổng cục Du lịch Hàn Quốc tại Việt Nam xin chúc mừng bạn đã nhận được 01 cặp vé xem phim trong sự kiện <b>"2021 Korea Movie Day - Ngày hội du lịch Hàn Quốc qua màn ảnh rộng".</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại sự kiện <u>để đổi vé trước suất chiếu ít nhất 30 phút.</u></b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b><u>THỜI GIAN MỞ CỬA QUẦY ĐỔI VÉ KTO</u></b></p>
										<p style="font-size: 15px; color: red;margin-left: 20px;"><b>- Tại CGV Vincom Xuân Khánh: từ 11:00 ngày 24/04/2021 - 16:00 ngày 25/04/2021</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO! Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">Ngoài ra KTO còn có rất nhiều event với giải thưởng hấp dẫn như tai nghe Galaxy Buds Live thời thượng tại Facebook: <a target="_blank" href="https://www.facebook.com/KTOVietNam">https://www.facebook.com/KTOVietNam</a>
										</p>
										<p style="font-size: 15px; color:#222;">Các bạn hãy tham gia để có cơ  hội nhận được nhiều phần quà giá trị nhé!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}

	private function handleHTML8()
	{
		return '<table width="640" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px; width: 100%;">
					<tr>
						<td align="center" valign="top">'.($this->imageHMTL()).'</td>
					</tr>
					<tr>
						<td align="center" valign="top">
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 0;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: #222;">Chúc mừng bạn đã nhận được cặp vé xem phim <b>NGHỀ SIÊU KHÓ</b> vào lúc <b>14:00 ngày Chủ Nhật, 25/04/2021</b> trong sự kiện "2021 Korea Movie Day" do Tổng cục Du lịch Hàn Quốc tại Việt Nam tổ chức.</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b>Bạn vui lòng trình QR code đã được KTO gửi đến bạn tới QUẦY ĐỔI VÉ CỦA KTO tại rạp CGV Vincom Xuân Khánh <u>để đổi vé trước 13:30 ngày 25/04</u>. <br>Sau thời gian này quầy đổi vé sẽ đóng cửa.</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color: red;"><b><u>THỜI GIAN MỞ CỬA QUẦY ĐỔI VÉ KTO</u></b></p>
										<p style="font-size: 15px; color: red;"><b>- Tại CGV Vincom Xuân Khánh: từ 11:00 ngày 24/4/2021 - 16:00 ngày 25/4/2021</b></p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: blue; padding: 8px 0 4px 0;"><b>Lưu ý:</b></h3>
										<p style="font-size: 15px; color: blue;">- Vị trí ngồi đẹp sẽ được ưu tiên cho khách hàng đổi vé sớm. Vì vậy bạn hãy đến sớm để chọn chỗ ngồi đẹp nhé!</p>
										<p style="font-size: 15px; color: blue;">- Mỗi QR code chỉ đổi được <b>1 cặp vé (2 vé)</b> xem phim.</p>
										<p style="font-size: 15px; color: blue;">- QR code phải là code đích danh, <b>không thể chuyển nhượng</b></p>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Ngoài ra, khi đến sớm bạn sẽ có thể tham dự các hoạt động bên lề khác như sau:</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p>Check-in nhận túi Ecobag dễ thương.</p></li>
											<li><p>Chụp ảnh check in tại photozone khung cảnh Hàn Quốc sống động.</p></li>
											<li><p>In ảnh mini MIỄN PHÍ ngay tại sự kiện.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">
										<h3 style="font-size: 15px; color: #222; padding: 10px 0 4px 0;"><b><i>Đặc biệt, trước giờ chiếu phim 30 phút bạn sẽ có cơ hội tham gia "quiz show" với các phần quà siêu hấp dẫn</i></b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p style="font-size: 15px; color: #222;">Vali du lịch cao cấp 20 inch.</p></li>
											<li><p style="font-size: 15px; color: #222;">Bộ hộp đựng thực phẩm thủy tinh Lock&amp;Lock.</p></li>
										</ul>
									</td>
								</tr>
								<tr>
									<td align="left" valign="center">
										<p style="font-size: 15px; color:#222;">
											Hãy đến thật sớm để trải nghiệm hay, rinh quà liền tay và thưởng thức những bộ phim thú vị cùng KTO nhé!
										</p>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="left" valign="center">
										<h3 style="font-size: 15px; color:#222; text-transform: uppercase; padding: 8px 0 4px 0;"><b>Thông tin chương trình</b></h3>
										<ul style="font-size: 15px; color: #222; margin: 0 0 0 30px; padding: 0;">
											<li><p><span style="color: red;">Thời gian</span>: Ngày <b>25/04: 14h00</b> – Phim: <b>NGHỀ SIÊU KHÓ</b>.</p></li>
											<li><p><span style="color: red;">Địa điểm</span>: Rạp chiếu phim CGV Vincom Xuân Khánh - Tầng 5, Tòa nhà 209, Đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ.</p></li>
										</ul>
										<p style="font-size: 15px; color:#222;">Chúc bạn có một buổi xem phim thật đáng nhớ với những bộ phim đầy thú vị!</p>
										<p style="font-size: 15px; color:#222;">Hẹn gặp lại bạn tại Ngày hội du lịch Hàn Quốc qua màn ảnh rộng 2021 Korea Movie Day tại Cần Thơ!</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>';
	}

	
	private function imageHMTL()
	{
		return '<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="50%" align="left" valign="center">
							<img src="'.($this->logo).'" border="0" alt="Korea Movie Day 2021" height="80" style="margin:0; padding:0; display:block;" />
						</td>
						<td width="50%" align="right" valign="center">
							<img src="'.($this->kmd2021).'" border="0" alt="Korea Movie Day 2021" height="80" style="margin:0; padding:0; display:block;"/>
						</td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="font-size:0; line-height: 0; padding: 25px;">&nbsp;</td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="100%" align="center" valign="top">
							<img src="'.($this->qrcode).'" alt="Korea Movie Day 2021 - QRCode" width="150" height="150" style="margin:0 auto; padding:0; display:block; border: 2px solid #ddd; border-radius: 4px;"/>
						</td>
					</tr>
					<tr>
						<td width="100%" align="center" valign="center">
							<p style="text-align: center; font-size: 22px; color: #000; padding: 10px 0;"><b style="letter-spacing: 4px;">'.($this->txtcode).'</b></p>
						</td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
					</tr>
				</table>';
	}

	private function noQRCodeHMTL()
	{
		return '<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="50%" align="left" valign="center">
							<img src="'.($this->logo).'" border="0" alt="Korea Movie Day 2021" height="80" style="margin:0; padding:0; display:block;" />
						</td>
						<td width="50%" align="right" valign="center">
							<img src="'.($this->kmd2021).'" border="0" alt="Korea Movie Day 2021" height="80" style="margin:0; padding:0; display:block;"/>
						</td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="font-size:0; line-height: 0; padding: 30px;">&nbsp;</td>
					</tr>
				</table>';
	}
	
	private function defautHMTL($content)
	{
		return '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Korea Movie Day 2021 - Email</title>  
		<style type="text/css">
			/* CLIENT-SPECIFIC STYLES */
			body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
			table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
			img { -ms-interpolation-mode: bicubic; }

			/* RESET STYLES */
			:root {
				font-size: 62.5%;
			}
			html, div, span, table, tbody, tfoot, thead, tr, th, td {
				margin: 0;
				padding: 0;
				border: 0;
			}
			img { border: none; outline: none; text-decoration: none; }
			table { border-collapse: collapse !important; margin: 0; }
			body { margin: 0 !important; padding: 0 !important; width: 100% !important; }

			/* iOS BLUE LINKS */
			a[x-apple-data-detectors] {
				color: inherit !important;
				text-decoration: none !important;
				font-size: inherit !important;
				font-family: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
			}
			
			/* ANDROID CENTER FIX */
			div[style*="margin: 16px 0;"] { margin: 0 !important; }
			
			/* default */
			h1, h2, h3, h4, h5, h6, p, strong, u, b, i
			{
				font-family: Roboto,Helvetica,Aria,sans-serif;
				word-break: break-word;
				line-height: 1.5;
				text-align: left;
				letter-spacing: 0.2px;
			}
			h1, h2, h3, h4, h5, h6
			{
				margin: 0;
			}
			p{
				display: block;
				margin: 0;
				padding: 3px 0;
			}
			
		</style> 
	</head>
	<body style="margin:0; padding:0; background-color:#1c3470;"><center>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#1c3470">
			<tr>
				<td align="center" valign="top">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
						</tr>
					</table>
				<td>
			</tr>
			<tr>
				<td align="center" valign="top">
					<table width="800" cellpadding="0" cellspacing="0" border="0" bgcolor="#fff" style="background-color: #fff; max-width: 800px; width: 100%;">
						<tr>
							<td align="center" valign="top">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td style="font-size:0; line-height: 0; padding: 15px;">&nbsp;</td>
									</tr>
								</table>
							<td>
						</tr>
						<tr>
							<td align="center" valign="top">
								'.($content).'
							</td>
						</tr>
						<tr>
							<td align="center" valign="top">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td style="font-size:0; line-height: 0; padding: 20px;">&nbsp;</td>
									</tr>
								</table>
							<td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td style="font-size:0; line-height: 0; padding: 10px;">&nbsp;</td>
						</tr>
					</table>
				<td>
			</tr>
		</table>
	</center></body>
</html>';
	}
}