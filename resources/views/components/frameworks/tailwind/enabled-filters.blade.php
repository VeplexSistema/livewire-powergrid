@if(count($enabledFilters))
    <div class="w-full pt-3">
        @if(count($enabledFilters) > 1)
            <span
                class="cursor-pointer inline-flex rounded-full items-center p-1 mr-1 text-sm font-medium"
                style="background-color: #7c39b3; color:white">
                Limpar Tudo {{-- {{ trans('livewire-powergrid::datatable.buttons.clear_all_filters') }} --}}
              <button type="button"
                      wire:click.prevent="clearAllFilters()"
                      class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-white dark:text-gray-300 hover:bg-gray-400 hover:text-gray-500 focus:outline-none focus:bg-gray-500 focus:text-gray-300 dark:focus:text-gray-500">
                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                  <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
                </svg>
              </button>
            </span>
        @endif

        @foreach($enabledFilters as $field => $filter)
            <span
                class="cursor-pointer inline-flex rounded-full items-center p-1 mr-1 text-sm font-medium table-thead-veplex">
              {{ $filter['label'] }}
              <button type="button" onclick="EscondeGrid()"
                      wire:click.prevent="clearFilter('{{ $field }}')"
                      class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center dark:text-gray-300 hover:bg-gray-200 hover:text-gray-500 focus:outline-none focus:bg-gray-500 focus:text-gray-200 dark:hover:bg-gray-300 dark:hover:text-gray-500">
                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                  <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
                </svg>
              </button>
        </span>
        @endforeach
    </div>
@endif
<script>
function EscondeGrid() {
  var div = document.getElementById('filtroHidden');
  var tempo = 0;
  var intervalo = setInterval(function() {
      tempo += 100; // Incrementa 100 milissegundos a cada intervalo
      if (tempo >= 3000) { // 5000 milissegundos = 5 segundos
          clearInterval(intervalo); // Limpa o intervalo após 5 segundos
      }
      if (div.style.display === 'block') {
          div.style.display = 'none';
          clearInterval(intervalo); // Se a div tem display flex, limpa o intervalo imediatamente
      }
  }, 100); // Verifica a cada 100 milissegundos
}
</script>