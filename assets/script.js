/* php-json-formateador - script.js */
(function(){
  'use strict';

  const btnCopiar = document.getElementById('btn-copiar');
  const btnLimpiar = document.getElementById('btn-limpiar');
  const textarea = document.getElementById('json');
  const resultado = document.getElementById('resultado');

  // Copiar resultado al portapapeles
  if (btnCopiar && resultado) {
    btnCopiar.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(resultado.textContent);
        const original = btnCopiar.textContent;
        btnCopiar.textContent = '✅ Copiado!';
        btnCopiar.style.background = '#10b981';
        setTimeout(() => {
          btnCopiar.textContent = original;
          btnCopiar.style.background = '';
        }, 1500);
      } catch (e) {
        alert('No se pudo copiar. Selecciona manualmente.');
      }
    });
  }

  // Limpiar campos
  if (btnLimpiar && textarea) {
    btnLimpiar.addEventListener('click', () => {
      textarea.value = '';
      textarea.focus();
      // Quitar resultados previos
      const r = document.querySelector('.resultado');
      if (r) r.remove();
    });
  }

  // Validación en vivo opcional: atajo Ctrl+Enter para enviar
  if (textarea) {
    textarea.addEventListener('keydown', (e) => {
      if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        document.getElementById('form-json').submit();
      }
    });
  }
})();