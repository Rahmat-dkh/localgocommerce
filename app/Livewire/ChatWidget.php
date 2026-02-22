<?php

namespace App\Livewire;

use Livewire\Component;

class ChatWidget extends Component
{
    // isOpen handled by AlpineJS client-side
    public $messages = [];
    public $messageInput = '';

    public function mount()
    {
        // Initial bot greeting
        $this->messages[] = [
            'type' => 'bot',
            'text' => 'Halo! Selamat datang di LocalGo, pusat kuliner nusantara dan oleh-oleh asli Indonesia. 🇮🇩 Ada yang bisa kami bantu?',
            'time' => now()->setTimezone('Asia/Jakarta')->format('H:i')
        ];
    }

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function sendMessage($text = null)
    {
        // If text passed via argument (from Alpine), use it. Otherwise use property.
        $input = $text ?? $this->messageInput;

        if (trim($input) === '') {
            return;
        }

        // User Message
        $this->messages[] = [
            'type' => 'user',
            'text' => $input,
            'time' => now()->setTimezone('Asia/Jakarta')->format('H:i')
        ];

        $userMsg = $input;
        $this->messageInput = ''; // Clear property too just in case

        // Simulate Bot Typing/Reply
        // In a real app, this would call an API.
        // For now, we simulate a delay then reply.
        $this->dispatch('scroll-chat');

        // Use a simple logic for dummy replies
        $replyData = $this->getBotReply($userMsg);

        // Add Bot Reply after delay
        $this->messages[] = [
            'type' => 'bot',
            'text' => $replyData['text'],
            'isFallback' => $replyData['isFallback'] ?? false,
            'time' => now()->setTimezone('Asia/Jakarta')->format('H:i')
        ];

        $this->dispatch('scroll-chat');
    }

    private function getBotReply($msg)
    {
        $msg = strtolower($msg);
        $reply = '';

        // Product & Price
        if (str_contains($msg, 'harga') || str_contains($msg, 'biaya') || str_contains($msg, 'mahal') || str_contains($msg, 'price')) {
            $reply = 'Harga kami sangat bersahabat karena diambil langsung dari UMKM kuliner. Range harga mulai Rp 5.000 (Snack/Cemilan) hingga paket oleh-oleh premium.';
        } elseif (str_contains($msg, 'produk') || str_contains($msg, 'jual') || str_contains($msg, 'barang') || str_contains($msg, 'menu') || str_contains($msg, 'katalog')) {
            $reply = 'Kami menyajikan berbagai kelezatan Nusantara! Mulai dari camilan kering (keripik, emping), sambal khas daerah, hingga kue tradisional dan bahan masakan lokal.';
        } elseif (str_contains($msg, 'kirim') || str_contains($msg, 'ongkir') || str_contains($msg, 'kurir') || str_contains($msg, 'antar') || str_contains($msg, 'pengiriman')) {
            $reply = 'Kami melayani pengiriman ke seluruh pelosok Indonesia via JNE, J&T, dan SiCepat. Untuk area lokal, bisa pakai GoSend/GrabExpress.';
        } elseif (str_contains($msg, 'lokasi') || str_contains($msg, 'alamat') || str_contains($msg, 'toko') || str_contains($msg, 'posisi') || str_contains($msg, 'kota')) {
            $reply = 'Mitra UMKM kuliner kami tersebar di seluruh Indonesia. Kantor utama LocalGo berada di Purworejo, Jawa Tengah, tapi pengiriman dilakukan langsung dari daerah asal kuliner tersebut agar tetap fresh.';
        } elseif (str_contains($msg, 'wa') || str_contains($msg, 'whatsapp') || str_contains($msg, 'nomor') || str_contains($msg, 'hubungi') || str_contains($msg, 'telepon')) {
            $reply = 'Boleh, untuk respon cepat bisa WA Admin kami di 0857-1296-6082. Atau klik tombol "Hubungi via WhatsApp" di bawah jika butuh bantuan langsung.';
        } elseif (str_contains($msg, 'jam') || str_contains($msg, 'buka') || str_contains($msg, 'tutup') || str_contains($msg, 'operasional')) {
            $reply = 'Toko Online kami buka 24 Jam! Tapi untuk Admin chat standby Senin-Sabtu jam 08.00 - 20.00 WIB.';
        } elseif (str_contains($msg, 'bayar') || str_contains($msg, 'rekening') || str_contains($msg, 'transfer') || str_contains($msg, 'cod') || str_contains($msg, 'dana') || str_contains($msg, 'ovo')) {
            $reply = 'Pembayaran mudah! Bisa Transfer Bank (BCA, BRI), E-Wallet (Dana, OVO), atau QRIS. Kami juga support COD untuk wilayah tertentu.';
        } elseif (str_contains($msg, 'promo') || str_contains($msg, 'diskon') || str_contains($msg, 'code') || str_contains($msg, 'voucher')) {
            $reply = 'Ada promo Gratis Ongkir untuk pembelian minimal Rp 50.000 khusus produk makanan ringat! Cek banner di halaman depan ya.';
        } elseif (str_contains($msg, 'reseller') || str_contains($msg, 'dropship') || str_contains($msg, 'mitra') || str_contains($msg, 'bantuan')) {
            $reply = 'Kami membuka peluang kemitraan untuk membantu UMKM naik kelas. Chat WA admin dengan ketik "GABUNG MITRA" ya!';
        } elseif (str_contains($msg, 'halo') || str_contains($msg, 'hai') || str_contains($msg, 'pagi') || str_contains($msg, 'siang') || str_contains($msg, 'sore') || str_contains($msg, 'malam') || str_contains($msg, 'assalamualaikum')) {
            $reply = 'Halo! Selamat datang di LocalGo. Mari lestarikan cita rasa Nusantara! 🇮🇩 Produk kuliner apa yang sedang Anda cari?';
        } elseif (str_contains($msg, 'terima kasih') || str_contains($msg, 'makasih') || str_contains($msg, 'thanks') || str_contains($msg, 'ok') || str_contains($msg, 'sip') || str_contains($msg, 'mantap')) {
            $reply = 'Sama-sama! Terima kasih sudah mendukung UMKM Indonesia. Ditunggu orderannya ya! 😊';
        }

        if ($reply) {
            return ['text' => $reply, 'isFallback' => false];
        }

        // Default / Fallback
        return [
            'text' => 'Maaf, saya bot asisten virtual dan tidak mengerti pertanyaan tersebut. Agar lebih jelas, Anda bisa langsung chat Admin kami melalui WhatsApp ya.',
            'isFallback' => true
        ];
    }

    public function render()
    {
        return view('livewire.chat-widget');
    }
}
