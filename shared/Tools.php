<?php

namespace Shared;

/**
 * Class for Tools
 */
class Tools {

    private static function getModalSize($modalSize){
        return $modalSize ? "modal-lg":"";
    }

    public static function getTool(
        $name,
        $displayname,
        $icon,
        $description,
        $bgclass,
        $content,
        $modalSize
    ): string {
        return '
            <div class="col col-sm-4">
                <div class="tool-item info-box ' . $bgclass . '"
                id="' . str_replace(' ', '', strtolower($displayname)) . '"
                data-bs-toggle="modal"
                data-bs-target="#' . $name . '">
                    <span class="info-box-icon"><i class="' . $icon . '"></i></span>
                    <div class="info-box-content">
                        <span title="' . $displayname . '" class="info-box-number">' . $displayname . '</span>
                        <span title="' . $description . '" class="info-box-text">' . $description . '</span>
                    </div>
                </div>
                <div
                    class="modal fade ' . self::getModalSize($modalSize) . '"
                    id="' . $name . '"
                    tabindex="-1"
                    aria-labelledby="' . $name . 'Label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header ' . $bgclass . '">
                            <h5 class="modal-title" id="' . $name . 'Label">
                                <i class="' . $icon . '"></i> ' . $displayname . '
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="' . $name . 'Content">
                            <script> $( "#' . $name . 'Content" ).load( "' . $content . '" ); </script>
                            
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}
