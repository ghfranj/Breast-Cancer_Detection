

from kedro.pipeline import Pipeline, node
from src.kit.pipelines.pathology_mass_prediction.nodes import predict_breast_density, \
                                                                clean_mask_input, predict_mass_pathology


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
        #     outputs='patient_mass_info'
        # ),
        node(
            predict_mass_pathology,
            inputs='patient_mass_info',
            outputs='patient_mass_pathology'
        ),
    ])
