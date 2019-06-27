<div class="form-group @error('nome')is-invalid @enderror">
    <label for="nome">Nome <sup style="color:red">*</sup>  </label>
    <input type="text" name="nome" id="nome" value="{{ isset($cliente->nome) ? $cliente->nome : old('nome') }}" class="form-control" placeholder="Nome Completo" required>
    @error('nome')
        <p class="help-block">{{ $message }}</p>
    @enderror
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group @error('cpf')is-invalid @enderror">
            <label for="cpf">CPF <sup style="color:red">*</sup></label>
            <input type="text" name="cpf" id="cpf" value="{{isset($cliente->cpf) ? $cliente->cpf : old('cpf') }}" class="form-control" placeholder="Min:11" required>
            @error('cpf')
                <p class="help-block">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="formp-group @error('cpf')is-invalid @enderror">
            <label for="email">Email <sup style="color:red">*</sup></label>
            <input type="email" name="email" id="email" value="{{ isset($cliente->email) ? $cliente->email : old('email') }}" class="form-control" required>
            @error('email')
                <p class="help-block">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
<div>
    <button type="submit" class="btn btn-success">{{ $formMode === 'create' ? 'cadastrar' : 'atualizar' }}</button>
</div>