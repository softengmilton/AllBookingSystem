<div class="bravo-list-item @if(!$rows->count()) not-found @endif">
    @if($rows->count())
        <div class="text-paginate">
            <h2 class="text">
                @if($rows->total() > 1)
                    {{ __(":count tours found",['count'=>$rows->total()]) }}
                @else
                    {{ __(":count tour found",['count'=>$rows->total()]) }}
                @endif
            </h2>
            <span class="count-string">{{ __("Showing :from - :to of :total Tours",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
        </div>
        <div class="list-item">
            <div class="row">
                @foreach($rows as $row)
                    <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                        @include('Tour::frontend.layouts.search.loop-grid')
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bravo-pagination">
            {{$rows->appends(request()->except(['_ajax']))->links()}}
        </div>
    @else
        <div class="not-found-box">
            <h3 class="n-title">{{__("We couldn't find any tours.")}}</h3>
            <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
        </div>
    @endif
</div>
