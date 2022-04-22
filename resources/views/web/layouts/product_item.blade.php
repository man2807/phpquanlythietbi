<div class="product_item">
    <div class="top">
        <img src="..{{ $item->images }}" alt="" width="100" height="100">
    </div>
    <div class="bot">
        <div class="name">
            <h1 class="title">{{ $item->name }}</h1>
        </div>
        <div class="info">
            <p class="price">Giá: <strong><?php echo  VndDot($item->price_out); ?> VND</strong></p>
            <p class="dis"><em>{{ $item->description }}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;.</em></p>
        </div>
        <div class="action">
            <a href="/product/supplie={{ $item->sku }}" class="btn success">Mua ngay</a>
        </div>
    </div>
</div>