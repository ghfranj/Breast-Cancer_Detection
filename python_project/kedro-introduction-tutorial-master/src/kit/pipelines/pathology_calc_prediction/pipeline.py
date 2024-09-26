

from kedro.pipeline import Pipeline, node
from src.kit.pipelines.pathology_calc_prediction.nodes import predict_breast_density, \
                                                                clean_mask_input, predict_calc_pathology


def create_pipeline(**kwargs):
    return Pipeline([
        # node(
        #     clean_mask_input,
        #     inputs="raw_mammogram",
        #     outputs="clean_mammogram_without_clh"
        # ),
        # node(
        #     predict_breast_density,
        #     inputs='clean_mammogram_without_clh',
        #     outputs='patient_calc_info'
        # ),
        node(
            predict_calc_pathology,
            inputs='patient_calc_info',
            outputs='patient_calc_pathology'
        ),
    ])
