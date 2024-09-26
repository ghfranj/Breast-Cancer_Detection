

from kedro.pipeline import Pipeline, node
from src.kit.pipelines.swin_mask_rcnn_mammogram_mask_prediction.nodes import predict_mask_result
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
                    predict_mask_result,
                    inputs="clean_mammogram",
                    outputs="swin_rcnn_result",
                )
            ])
