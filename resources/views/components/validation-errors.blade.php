    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="mt-3 list-disc list-inside text-sm" style="list-style: none;color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
