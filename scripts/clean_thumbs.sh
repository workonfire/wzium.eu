#!/bin/bash

ALBUMS_DIR="./albums"

for album in "$ALBUMS_DIR"/*/; do
    thumbs_dir="${album}thumbs"

    [ -d "$thumbs_dir" ] || continue

    for thumb in "$thumbs_dir"/*.jpg; do
        [ -f "$thumb" ] || continue

        base=$(basename "$thumb" .jpg)
        found=false

        for ext in jpg jpeg png gif webp; do
            if [ -f "${album}${base}.${ext}" ]; then
                found=true
                break
            fi
        done

        if [ "$found" = false ]; then
            echo "Removing orphaned thumbnail: $thumb"
            rm -- "$thumb"
        fi
    done
done

echo "Cleanup done."
