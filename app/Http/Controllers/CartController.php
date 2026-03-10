<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        // 1. Получаем текущую корзину из сессии (или создаём пустую)
        $cart = $request->session()->get('cart', []);

        // 2. Ключ для товара — лучше использовать просто id продукта как строку
        $key = 'product_' . $product->id;

        // 3. Получаем желаемое количество (из JSON или из формы)
        // По умолчанию — 1, если ничего не передали
        $quantity = (int) $request->json('quantity');

        // Защита: количество должно быть положительным числом
        if ($quantity < 1) {
            $quantity = 1;
        }

        // 4. Проверяем, есть ли уже такой товар в корзине
        if (isset($cart[$key])) {
            // Если есть → увеличиваем количество
            $cart[$key]['quantity'] += $quantity;
        } else {
            // Если нет → добавляем новый товар
            $cart[$key] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $quantity,
                // можно добавить и другие поля, если нужно
                // 'image'    => $product->getFirstMediaUrl('images') ?? null,
                // 'slug'     => $product->slug,
            ];
        }

        // 5. Сохраняем обновлённую корзину обратно в сессию
        $request->session()->put('cart', $cart);

        // 6. Возвращаем ответ (для AJAX очень удобно)
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success'  => true,
                'message'  => 'Товар добавлен в корзину',
                'quantity' => $cart[$key]['quantity'],
                'total_items' => $this->getTotalItems($cart), // опционально
                'cart' => $cart,
            ]);
        }

        // Для обычного запроса — редирект с сообщением
        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

    private function getTotalItems(array $cart): int
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] ?? 0;
        }
        return $total;
    }
}
