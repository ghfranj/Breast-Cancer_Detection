

from kedro.pipeline import Pipeline, node

from src.kit.pipelines.breast_density_prediction.nodes import breast_density_input, predict_breast_density


def create_pipeline(**kwargs):
    return Pipeline([
        node(
            breast_density_input,
            inputs='raw_mammogram',
            outputs='clean_mammogram_without_clh'
        ),
        node(
            predict_breast_density,
            inputs='clean_mammogram_without_clh',
            outputs='patient_breast_density'
        ),

    ])
