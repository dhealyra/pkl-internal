<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('user')->latest()->get();

        $tittle = 'Hapus Pesanan!';
        $text = 'Apakah anda yakin ingin menghapus pesanan ini?';
        confirmDelete($tittle, $text);

        return view('backend.order.index', compact('order'));
    }

    public function show($id)
    {
        $order = Order::with('user', 'products')->findOrFail($id);
        return view('backend.order.index', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        toast('Pesanan berhasil dihapus', 'success');
        return redirect()->route('backend.order.index');
    }

    public function updateStatus(Request $req, $id)
    {
        $req->validate([
            'status' => 'required|in:pending,success,cancel',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $req->status;
        $order->save();
        toast('Status order berhasil diperbarui', 'success');
        return redirect()->route('backend.order.show');
    }
}
