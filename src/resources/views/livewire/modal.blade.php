<div>
    <!-- モーダルのトリガーボタン -->
    <button wire:click="openModal">モーダルを開く</button>

    <!-- モーダルの構造 -->
    @if($isOpen)
    <div class="modal">
        <div class="modal-content">
            <span class="close" wire:click="closeModal">&times;</span>
            <h2>モーダルタイトル</h2>
            <p>モーダルの内容</p>
        </div>
    </div>
    @endif
</div>
