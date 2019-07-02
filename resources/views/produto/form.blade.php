<div class="form-group">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group @error('codbarras')is-invalid @enderror">
                <label for="codbarras">codbarras <sup style="color:red">*</sup></label>
                <input type="text" name="codbarras" id="codbarras" value="{{ isset($produto->codbarras) ? $produto->codbarras : old('codbarras')}}" class="form-control">
                @error('codbarras')
                    <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group @error('valor')is-invalid @enderror">
                <label for="valor">valor <sup style="color:red">*</sup></label>
                <div class="input-group">
                    <span class="input-group-addon">R$</span>
                    <input type="text" name="valor" id="valor" value="{{isset($produto->valor) ? $produto->valor : old('valor')}}" class="form-control">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group @error('nome')is-invalid @enderror">
    <label for="nome">Nome <sup style="color:red">*</sup></label>
    <input type="text" name="nome" id="nome" value="{{isset($produto->nome) ? $produto->nome : old('nome')}}" class="form-control">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{ $formMode === 'create' ? 'cadastrar' : 'atualizar' }}">
</div>