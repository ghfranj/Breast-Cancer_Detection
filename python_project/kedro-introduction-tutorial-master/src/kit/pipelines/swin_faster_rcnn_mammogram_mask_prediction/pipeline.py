

from kedro.pipeline import Pipeline, node
from src.kit.pipelines.swin_faster_rcnn_mammogram_mask_prediction.nodes import predict_faster_result
from src.kit.pipelines.unet_mammogram_mask_prediction.nodes import clean_mask_input
def create_pipeline(**kwargs):
    return Pipeline(
            [
            node(
                clean_mask_input,
                inputs="raw_mammogram",
                outputs="clean_mammogram"
            ),
                node(
                    predict_faster_result,
                    inputs="clean_mammogram",
                    outputs="swin_faster_result",
                )
            ])
