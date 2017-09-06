{!! csrf_field() !!}
<div class="form-group">
    <label for="ramal" class="control-label col-sm-2">Ramal</label>
    <div class="col-sm-10">
        <input type="text" name="ramal" id="ramal" class="form-control" value="{{ $sip->name ?? '' }}" placeholder="Digite aqui o número do ramal">
    </div>
</div>
<div class="form-group">
    <label for="setor" class="control-label col-sm-2">Setor</label>
    <div class="col-sm-10">
        <input type="text" name="setor" id="description" class="form-control" value="{{ $sip->description ?? '' }}" placeholder="Setor do ramal">
    </div>
</div>
<div class="form-group">
    <label for="pwd" class="control-label col-sm-2">Senha</label>
    <div class="col-sm-10">
        @if(strpos(url()->current(),"edit"))
            <input type="text" name="pwd" id="md5secret" class="form-control" placeholder="Digite aqui para alterar a senha, Caso não queira alterar, deixe em branco">
        @else
        <input type="text" name="pwd" id="md5secret" class="form-control" placeholder="Senha para autenticação no Asterisk. Ex.: v01pb4rr31@00CCAA">
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        <input type="submit" value="salvar" class="btn btn-primary">
    </div>
</div>